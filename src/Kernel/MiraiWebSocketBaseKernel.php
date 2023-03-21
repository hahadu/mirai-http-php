<?php

namespace MiraiHttp\Kernel;
use Laravel\Octane\Swoole\SwooleClient;
use Swoole\WebSocket\Server;
use Swoole\WebSocket\Frame;

class MiraiWebSocketBaseKernel
{
    protected $host;
    protected $hook;
    protected $verifyKey;
    const WEB_SOCKET_CHANNEL_MESSAGE = 'message';
    const WEB_SOCKET_CHANNEL_EVENT = 'event';
    const WEB_SOCKET_CHANNEL_ALL = 'all';
    public function __construct(Server $server,Frame $frame,string $qq=null,string $verifyKey=null)
    {
        if(is_null($qq)){
            $qq = config('miraibot.default_member');
        }

        $this->qq = $qq;
        $this->verifyKey = $verifyKey??config('miraibot.verify_key');

    }

    public function connect($channel=self::WEB_SOCKET_CHANNEL_MESSAGE){
        //SwooleClient::


    }



}
