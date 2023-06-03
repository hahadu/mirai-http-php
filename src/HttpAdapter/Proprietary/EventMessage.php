<?php

namespace Hahadu\MiraiHttp\HttpAdapter\Proprietary;
use Hahadu\MiraiHttp\Kernel\MiraiHttpBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


class EventMessage extends MiraiHttpBaseKernel
{

    /**
     * 查看队列大小
     * @param int $count
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function countMessage(int $count):array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('countMessage',$body);
    }

    /**
     * 获取队列头部
     * @param int $count 消息数量
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function fetchMessage(int $count): array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('fetchMessage',$body);
    }
    /**
     * 获取队列尾部
     * @param int $count 消息数量
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function fetchLatestMessage(int $count): array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('fetchLatestMessage',$body);
    }
    /**
     * 查看队列头部
     * @param int $count 消息数量
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function peekMessage(int $count): array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('peekMessage',$body);
    }
    /**
     * 查看队列部
     * @param int $count 消息数量
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function peekLatestMessage(int $count): array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('peekLatestMessage',$body);
    }



}
