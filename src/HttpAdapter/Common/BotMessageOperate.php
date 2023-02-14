<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;

/**
 * 消息发送与撤回
 */
class BotMessageOperate extends MiraiBaseKernel
{
    const MIRAI_BOT_NUDGE_FRIEND = 'Friend';
    const MIRAI_BOT_NUDGE_GROUP = 'Group';
    const MIRAI_BOT_NUDGE_STRANGER = 'Stranger';

    /**
     * 发送好友消息
     * @param int|null $target 发送消息目标好友的QQ号
     * @param array $messageChain 消息链，是一个消息对象构成的数组
     * @param int|null $quote 引用一条消息的messageId进行回复
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sendFriendMessage(int|null $target,array $messageChain,int $quote=null):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target'=>$target,
            'messageChain'=>$messageChain,
        ];
        return $this->postMethodBot('sendFriendMessage',$body);
    }
    /**
     * 发送群消息
     * @param int|null $target 发送消息目标群号
     * @param array $messageChain 消息链，是一个消息对象构成的数组
     * @param int|null $quote 引用一条消息的messageId进行回复
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sendGroupMessage(int|null $target,array $messageChain,int $quote=null):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target'=>$target,
            'messageChain'=>$messageChain,
        ];
        return $this->postMethodBot('sendGroupMessage',$body);
    }

    /**
     * 发送临时会话消息
     * @param int $qq 临时会话对象QQ号
     * @param int $group 临时会话群号
     * @param int $quote 引用一条消息的messageId进行回复
     * @param array $messageChain 消息链，是一个消息对象构成的数组
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sendTempMessage(int $qq,int $group,int $quote,array $messageChain):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'qq'=>$qq,
            'messageChain'=>$messageChain,
            'group'=>$group,
            'quote'=>$quote
        ];
        return $this->postMethodBot('sendFriendMessage',$body);
    }

    /**
     * 发送头像戳一戳消息
     * @param int $target 戳一戳的目标, QQ号, 可以为 bot QQ号
     * @param int $subject 戳一戳接受主体(上下文), 戳一戳信息会发送至该主体, 为群号/好友QQ号
     * @param string $kind 上下文类型, 可选值 Friend, Group, Stranger
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sendNudge(int$target,int $subject,string $kind):array
    {
        throw_if(in_array($kind,['Friend', 'Group', 'Stranger']),\Exception::class,"参数错误");
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target'=>$target,
            'subject'=>$subject,
            'kind'=>$kind
        ];
        return $this->postMethodBot('sendNudge',$body);
    }

    /**
     * 撤回消息
     * @param int $message_id
     * @param int $target
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function recall(int $message_id, int $target):array
    {
        $body = [
            'sessionKey'=>cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq),
            'target'=>$target,
            'messageId'=>$message_id
        ];
        return $this->postMethodBot('sendNudge',$body);
    }

    /**
     * 获取漫游消息
     * @param string $timeStart
     * @param string $timeEnd
     * @param string $target
     * @return array
     */
    public function roamingMessages(string $timeStart,string $timeEnd,string $target):array
    {
        $body = [
            'timeStart'=>$timeStart,
            'timeEnd'=>$timeEnd,
            'target'=>$target
        ];
        return $this->postMethodBot('roamingMessages',$body);
    }

}
