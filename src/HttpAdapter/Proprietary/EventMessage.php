<?php

namespace MiraiHttp\HttpAdapter\Proprietary;
use MiraiHttp\Kernel\MiraiBaseKernel;


class EventMessage extends MiraiBaseKernel
{

    public function countMessage(int $count):array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'count'=>$count,
        ];
        return $this->getMethodBot('countMessage',$body);
    }

}
