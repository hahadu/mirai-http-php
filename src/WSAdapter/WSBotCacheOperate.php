<?php

namespace Hahadu\MiraiHttp\WSAdapter;
use Hahadu\MiraiHttp\Contracts\MiraiInterfaces\BotMessageCacheInterface;
use Hahadu\MiraiHttp\Kernel\MiraiWebSocketBaseKernel;

class WSBotCacheOperate extends MiraiWebSocketBaseKernel implements BotMessageCacheInterface
{

    /**
     * 通过messageId获取消息
     * @param int $message_id 获取消息的messageId
     * @param string $target 好友id或群id
     * @inheritDoc
     */
    public function messageFromId(int $messageId, string $target)
    {
        $content = [
            'messageId'=>$messageId,
            'target' => $target
        ];
        $this->server->push($this->frame->fd,$this->sendCommand('messageFromId',$content,$this->frame->fd));
    }

}
