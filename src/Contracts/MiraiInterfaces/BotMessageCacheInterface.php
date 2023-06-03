<?php

namespace Hahadu\MiraiHttp\Contracts\MiraiInterfaces;

interface BotMessageCacheInterface
{
    /**
     * 通过messageId获取消息
     * @return mixed
     */
    public function messageFromId(int $messageId,string $target);

}
