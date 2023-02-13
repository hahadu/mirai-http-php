<?php

namespace MiraiHttp\HttpAdapter\Proprietary;
use MiraiHttp\Kernel\MiraiBaseKernel;


class EventMessage extends MiraiBaseKernel
{

    /**
     * 队列大小
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

    //public function

}
