<?php

namespace Hahadu\MiraiHttp\WSAdapter;

use Hahadu\MiraiHttp\Contracts\MiraiInterfaces\BotApiPlugInterface;
use Hahadu\MiraiHttp\Contracts\MiraiInterfaces\BotMessageCacheInterface;
use Hahadu\MiraiHttp\Kernel\MiraiWebSocketBaseKernel;

class WSApiBotPlug extends MiraiWebSocketBaseKernel implements BotApiPlugInterface
{



    /**
     * 获取插件信息
     * @return array
     */
    public function about():void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('about',[],$this->frame->fd));
    }

    /**
     * 取所有当前登录账号
     * @return array
     */
    public function botList():void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('botList',[],$this->frame->fd));
    }
}
