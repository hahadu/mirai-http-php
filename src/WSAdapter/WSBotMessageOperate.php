<?php

namespace MiraiHttp\WSAdapter;

use MiraiHttp\Contracts\MiraiInterfaces\BotMessageOperateInterface;
use MiraiHttp\Kernel\MiraiWebSocketBaseKernel;

class WSBotMessageOperate extends MiraiWebSocketBaseKernel implements BotMessageOperateInterface
{

    /**
     * 发送好友消息
     * @param int|null $target 发送消息目标好友的QQ号
     * @param array $messageChain 消息链，是一个消息对象构成的数组
     * @param int|null $quote 引用一条消息的messageId进行回复
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function sendFriendMessage(?int $target, array $messageChain, int $quote = null)
    {
        $body = [
            'target'=>$target,
            'messageChain'=>$messageChain,
        ];
        $this->server->push($this->frame->fd,$this->sendCommand('sendFriendMessage',$body,$this->frame->fd));

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
    public function sendGroupMessage(?int $target, array $messageChain, int $quote = null)
    {
        $body = [
            'target'=>$target,
            'messageChain'=>$messageChain,
        ];
        $this->server->push($this->frame->fd,$this->sendCommand('sendGroupMessage',$body,$this->frame->fd));

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
    public function sendTempMessage(int $qq, int $group, int $quote, array $messageChain)
    {
        $body = [
            'qq'=>$qq,
            'messageChain'=>$messageChain,
            'group'=>$group,
            'quote'=>$quote
        ];
        $this->server->push($this->frame->fd,$this->sendCommand('sendTempMessage',$body,$this->frame->fd));

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
    public function sendNudge(int $target, int $subject, string $kind)
    {
        // TODO: Implement sendNudge() method.
    }

    /**
     * 撤回消息
     * @param int $message_id 需要撤回的消息的messageId
     * @param int $target 好友id或群id
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function recall(int $message_id, int $target)
    {
        // TODO: Implement recall() method.
    }

    /**
     * 获取漫游消息
     * @param string $timeStart 起始时间, UTC+8 时间戳, 单位为秒. 可以为 0, 即表示从可以获取的最早的消息起. 负数将会被看是 0.
     * @param string $timeEnd 结束时间, UTC+8 时间戳, 单位为秒. 可以为 Long.MAX_VALUE, 即表示到可以获取的最晚的消息为止. 低于 timeStart 的值将会被看作是 timeStart 的值.
     * @param string $target 漫游消息对象，好友id，目前仅支持好友漫游消息
     * @return array
     */
    public function roamingMessages(string $timeStart, string $timeEnd, string $target)
    {
        // TODO: Implement roamingMessages() method.
    }
}
