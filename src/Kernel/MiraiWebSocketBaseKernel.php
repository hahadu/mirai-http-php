<?php

namespace Hahadu\MiraiHttp\Kernel;
use Laravel\Octane\Swoole\SwooleClient;
use Swoole\WebSocket\Server;
use Swoole\WebSocket\Frame;

class MiraiWebSocketBaseKernel
{
    protected $host;
    protected $hook;
    protected $server;
    protected $frame;
    protected $verifyKey;
    const WEB_SOCKET_CHANNEL_MESSAGE = 'message';
    const WEB_SOCKET_CHANNEL_EVENT = 'event';
    const WEB_SOCKET_CHANNEL_ALL = 'all';
    public function __construct(Server $server,Frame $frame,string $qq=null,string $verifyKey=null)
    {
        if(is_null($qq)){
            $qq = config('miraibot.default_member');
        }
        $this->server = $server;
        $this->frame = $frame;

        $this->qq = $qq;
        $this->verifyKey = $verifyKey??config('miraibot.verify_key');
    }

    /**
     * @param string $command 命令字
     * @param array $content 命令的数据对象, 与通用接口定义相同
     * @param mixed $syncId 消息同步的字段
     * @param mixed $subCommand 子命令字, 可空
     * @return string
     */
    protected function sendCommand(string $command,array $content,$syncId,$subCommand=null):string
    {
        return json_encode([
            'syncId'  => $syncId,
            'command' => $command,
            'subCommand' => $subCommand,
            'content' => $content
        ],JSON_UNESCAPED_UNICODE);
    }

//    public function connect($channel=self::WEB_SOCKET_CHANNEL_MESSAGE){
//
//
//    }



}
