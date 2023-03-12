<?php

namespace MiraiHttp\WSAdapter;

use Illuminate\Console\Command;
use Swoole;

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

        $server->on('start', function ($server) {
            echo "Bot Websocket Server is started at ws://".config('miraibot.websocket.host').':'.config('miraibot.websocket.port');
        });

        $server->on('open', function($server, $req) {
            echo "connection open: {$req->fd}\n";
        });

        $server->on('message', function($server, $frame) {
            echo "received message: {$frame->data}\n";
            $server->push($frame->fd, json_encode(['hello', 'world']));
        });

        $server->on('close', function($server, $fd) {
            echo "connection close: {$fd}\n";
        });

        $server->start();
    }

}
