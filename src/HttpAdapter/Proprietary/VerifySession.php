<?php

namespace MiraiHttp\HttpAdapter\Proprietary;
use MiraiHttp\Kernel\MiraiHttpBaseKernel;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * 验证与会话
 */
class VerifySession extends MiraiHttpBaseKernel
{

    public function __construct($qq = null, $verifyKey = null)
    {
        parent::__construct($qq, $verifyKey);
    }

    /**
     * 验证
     * 获取sessionKey
     * 不使用的Session应当被释放，长时间（30分钟）未使用的Session将自动释放，否则Session持续保存Bot收到的消息，将会导致内存泄露(开启websocket后将不会自动释放)
     * @return string
     * @throws \Exception
     */
    public function verify(): array
    {
        return $this->postMethodBot('verify',['verifyKey'=>$this->verifyKey]);
    }

    /**
     * 绑定
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function bind():array
    {
        $sessionKey = $this->verify();
        $body = [
            'sessionKey'=>$sessionKey['session'],
            'qq'=>$this->qq
        ];

        $bind = $this->postMethodBot('bind',$body);
        throw_unless(0===$bind['code'],\Exception::class,$bind['msg'],$bind['code']);
        cache()->set(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq,$sessionKey['session'],1800);
        $body['status'] = $bind['msg'];
        return $body;

    }

    /**
     * 获取回话信息
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sessionInfo():array
    {

        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        if(is_null($sessionKey)){
            $this->bind();
        }
        throw_if(is_null($sessionKey),\Exception::class,'');
        $info = $this->getMethodBot('sessionInfo',['sessionKey'=>$sessionKey]);
        if(in_array($info['code'],[3,4])){
                $this->bind();
                return $this->sessionInfo();
        }
        throw_if(0!==$info['code'],\Exception::class,$info['msg'],$info['code']);
        return $info['data'];
    }


    /**
     * 释放
     * @return array
     * @throws InvalidArgumentException
     */
    public function release():array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'qq'=>$this->qq
        ];
        cache()->delete(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        return $this->postMethodBot('release',$body);
    }
}
