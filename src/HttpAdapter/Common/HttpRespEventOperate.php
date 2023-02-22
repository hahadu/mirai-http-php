<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;

/**
 * 事件处理
 */
class HttpRespEventOperate extends MiraiBaseKernel
{
    /**
     * 添加好友申请
     * @param int $event_id 响应申请事件的标识
     * @param int $from_id 事件对应申请人QQ号
     * @param int $group_id 事件对应申请人的群号，可能为0
     * @param int $operate 响应的操作类型
     * @param string $message 回复的信息
     * @return array
     */
    public function respNewFriendRequestEvent(int $event_id,int $from_id,int $group_id,int $operate,string $message):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "eventId"=> $event_id,
            "fromId"=> $from_id,
            "groupId"=> $group_id,
            "operate"=> $operate,
            "message"=> $message,
        ];
        return $this->postMethodBot('resp/newFriendRequestEvent',$body);
    }    /**
     * 用户入群申请
     * @param int $event_id 响应申请事件的标识
     * @param int $from_id 事件对应申请人QQ号
     * @param int $group_id 事件对应申请人的群号
     * @param int $operate 响应的操作类型
     * @param string $message 回复的信息
     * @return array
     */
    public function respMemberJoinRequestEvent(int $event_id,int $from_id,int $group_id,int $operate,string $message):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "eventId"=> $event_id,
            "fromId"=> $from_id,
            "groupId"=> $group_id,
            "operate"=> $operate,
            "message"=> $message,
        ];
        return $this->postMethodBot('resp/memberJoinRequestEvent',$body);
    }

    /**
     * Bot被邀请入群申请
     * @param int $event_id 响应申请事件的标识
     * @param int $from_id 事件对应申请人QQ号
     * @param int $group_id 事件对应申请人的群号，可能为0
     * @param int $operate 响应的操作类型
     * @param string $message 回复的信息
     * @return array
     */
    public function respBotInvitedJoinGroupRequestEvent(int $event_id,int $from_id,int $group_id,int $operate,string $message):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "eventId"=> $event_id,
            "fromId"=> $from_id,
            "groupId"=> $group_id,
            "operate"=> $operate,
            "message"=> $message,
        ];
        return $this->postMethodBot('resp/botInvitedJoinGroupRequestEvent',$body);
    }
}
