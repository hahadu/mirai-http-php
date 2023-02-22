<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;

class FriendOperate extends MiraiBaseKernel
{

    /**
     * 删除好友
     * @param int $target 删除好友的QQ号码
     * @return array
     */
    public function deletefriend(int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
        ];
        return $this->postMethodBot('deleteFriend',$body);
    }
}
