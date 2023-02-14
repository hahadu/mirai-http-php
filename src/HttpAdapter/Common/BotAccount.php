<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * 获取账号信息
 */
class BotAccount extends MiraiBaseKernel
{

    /**
     * 获取bot的好友列表
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function friendList():array
    {
        return $this->getMethodBot('friendList',['sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq)]);
    }

    /**
     * 获取群列表
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function groupList():array
    {

        return $this->getMethodBot('groupList',['sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq)]);
    }


    /**
     * 获取bot指定群中的成员列表
     * @param string $target 群id
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function groupMemberList(string $target):array
    {
        $body = [
            'sessionKey' => cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target' => $target,
        ];

        return $this->getMethodBot('memberList',$body);

    }

    /**
     * 获取最新群成员列表
     * @param string $target 群id
     * @param array|null $member_ids 群成员账号, 为空表示获取所有
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function groupLatestMemberList(string $target,array $member_ids=null):array
    {
        $body = [
            'sessionKey' => cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target' => $target
        ];
        if($member_ids!=null){
            $body['memberIds'] = $member_ids;
        }

        return $this->getMethodBot('latestMemberList',$body);
    }

    /**
     * 获取bot资料
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function botProfile():array
    {
        return $this->getMethodBot('botProfile',['sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq)]);

    }

    /**
     * 获取好友资料
     * @param int $target 指定好友账号
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function friendProfile(int $target):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target' => $target,
        ];
        return $this->getMethodBot('friendProfile',$body);
    }

    /**
     * 获取群成员资料
     * @param int $target 群id
     * @param int $member_id 群成员QQ号码
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function memberProfile(int $target,int $member_id):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target' => $target,
            'memberId' => $member_id
        ];
        return $this->getMethodBot('memberProfile',$body);
    }

    /**
     * 获取QQ用户资料
     * @param int $target 要查询的QQ号码
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function userProfile(int $target):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target' => $target,
        ];
        return $this->getMethodBot('userProfile',$body);
    }

}
