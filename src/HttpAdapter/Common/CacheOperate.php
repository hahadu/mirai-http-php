<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Contracts\MiraiInterfaces\BotMessageCacheInterface;
use MiraiHttp\Kernel\MiraiHttpBaseKernel;

/**
 * 缓存操作
 */
class CacheOperate extends MiraiHttpBaseKernel implements BotMessageCacheInterface
{
    /**
     * 通过messageId获取消息
     * @param int $message_id 获取消息的messageId
     * @param string $target 好友id或群id
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function messageFromId(int $message_id, string $target):array
    {
        $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            'sessionKey'=>$sessionKey,
            'messageId'=>$message_id,
            'target' => $target
        ];
        return $this->getMethodBot('messageFromId',$body);
    }

}
