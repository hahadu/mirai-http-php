<?php

namespace MiraiHttp\WSAdapter;

use Illuminate\Console\Command;
use Swoole;
use Swoole\Constant;

class BotWebsocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot-websocket-server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'bot-websocket-server';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $server = new Swoole\Websocket\Server(config('miraibot.websocket_server.host'), config('miraibot.websocket_server.port'));

        $server->on(Constant::EVENT_START, function (Swoole\Websocket\Server $server) {
            echo "Bot Websocket Server is started at ws://".config('miraibot.websocket_server.host').':'.config('miraibot.websocket_server.port');
        });

        $server->on(Constant::EVENT_OPEN, function($server, $req) {
            echo "connection open: {$req->fd}\n";
        });

        $server->on(Constant::EVENT_MESSAGE, function($server,Swoole\WebSocket\Frame $frame) {
            echo "received message: {$frame->data}\n";
            new WSBotAccount($server,$frame);
            new WSApiBotPlug($server,$frame);
            dump($frame);
            //$server->push($frame->fd, json_encode(['hello', 'world']));//測試websocket鏈接
        });

        $server->on(Constant::EVENT_CLOSE, function($server, $fd) {
            echo "connection close: {$fd}\n";
        });

        $server->start();
    }

}
