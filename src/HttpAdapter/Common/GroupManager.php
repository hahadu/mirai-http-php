<?php

namespace Hahadu\MiraiHttp\HttpAdapter\Common;

use Hahadu\MiraiHttp\Kernel\MiraiHttpBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * 群管理
 */
class GroupManager extends MiraiHttpBaseKernel
{
    /**
     * 禁言群成员
     * @param int $target 指定群的群号
     * @param int $member_id 指定群员QQ号
     * @param int $time 禁言时长，单位为秒，最多30天，默认为0
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mute(int $target,int $member_id,int $time=1800):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
            "memberId"=> $member_id,
            "time"=> $time,
        ];
        return $this->postMethodBot('mute',$body);
    }

    /**
     * 移除群成员
     * @param int $target 指定群的群号
     * @param int $member_id 指定群员QQ号
     * @param bool $block 移除后拉黑，默认为 false
     * @param string $msg 信息
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function kick(int $target,int $member_id,bool $block=false,string $msg=""):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY . $this->qq);
        $body = [
            "sessionKey" => $session_key,
            "target" => $target,
            "memberId" => $member_id,
            "block" => $block,
            "msg" => $msg,
        ];
        return $this->postMethodBot('kick', $body);
    }

    /**
     * 退出群聊
     * @param int $target 退出的群号
     * @return array
     */
    public function quit(int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
        ];
        return $this->postMethodBot('quit',$body);
    }
    /**
     * 全体禁言
     * @param int $target 指定群的群号
     * @return array
     */
    public function mute_all(int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
        ];
        return $this->postMethodBot('muteAll',$body);
    }
    /**
     * 解除全体禁言
     * @param int $target 指定群的群号
     * @return array
     */
    public function unmuteAll(int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
        ];
        return $this->postMethodBot('unmuteAll',$body);
    }
    /**
     * 设置群精华消息
     * @param int $message_id 精华消息的messageId
     * @param int $target 群id
     * @return array
     */
    public function setEssence(int $message_id,int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "messageId"=> $message_id,
            "target"=> $target,
        ];
        return $this->postMethodBot('setEssence',$body);
    }
    /**
     * 获取群设置
     * @param int $target 指定群的群号
     * @return array
     */
    public function getGroupConfig(int $target):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
        ];
        return $this->getMethodBot('groupConfig',$body);
    }

    /**
     * 修改群设置
     * @param int $target 指定群的群号
     * @param object $config 群设置
     * @param string $name 群名
     * @param string $announcement 群公告
     * @param bool $confess_talk 是否开启坦白说
     * @param bool $allow_member_invite 是否允许群员邀请
     * @param bool $auto_approve 是否开启自动审批入群
     * @param bool $anonymous_chat 是否允许匿名聊天
     * @return array
     */
    public function changeGroupConfig(int $target,object $config,string $name="Name",string $announcement="Announcement",bool $confess_talk=false,bool $allow_member_invite=false,bool $auto_approve=false,bool $anonymous_chat=false):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
            "config"=> $config,
            "name" => $name,
            "announcement"=> $announcement,
            "confessTalk"=> $confess_talk,
            "allowMemberInvite"=> $allow_member_invite,
            "autoApprove"=> $auto_approve,
            "anonymousChat"=> $anonymous_chat,
        ];
        return $this->postMethodBot('groupConfig',$body);
    }

    /**
     * 获取群员设置
     * @param int $target 指定群的群号
     * @param int $member_id 群员QQ号
     * @return array
     */
    public function getMemberInfo(int $target,int $member_id):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
            "memberId"=> $member_id,
        ];
        return $this->getMethodBot('memberInfo',$body);
    }
    /**
     * 获取群员设置
     * @param int $target 指定群的群号
     * @param int $member_id 群员QQ号
     * @param object $info 群员资料
     * @param string $name 群名片，即群昵称
     * @param string $special_title 群头衔
     * @return array
     */
    public function memberInfo(int $target,int $member_id,object $info,string $name="Name",string $special_title="Title"):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
            "memberId"=> $member_id,
            "info"=> $info,
            "name"=> $name,
            "specialTitle"=> $special_title,
        ];
        return $this->postMethodBot('memberInfo',$body);
    }
    /**
     * 修改群员管理员
     * @param int $target 指定群的群号
     * @param int $member_id 群员QQ号
     * @param bool $assign 是否设置为管理员
     * @return array
     */
    public function memberAdmin(int $target,int $member_id,bool $assign):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "target"=> $target,
            "memberId"=> $member_id,
            "assign"=> $assign,
        ];
        return $this->postMethodBot('memberAdmin',$body);
    }
}
