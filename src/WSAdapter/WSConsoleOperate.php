<?php

namespace Hahadu\MiraiHttp\WSAdapter;

use Hahadu\MiraiHttp\Contracts\MiraiInterfaces\BotConsoleOperateInterface;
use Hahadu\MiraiHttp\Kernel\MiraiWebSocketBaseKernel;

class WSConsoleOperate extends MiraiWebSocketBaseKernel implements BotConsoleOperateInterface
{

    /**
     * 执行命令
     * @param array $command 命令与参数 ,console 支持以不同消息类型作为指令的参数, 执行命令需要以消息类型作为参数, 若执行纯文本的命令, 构建多个 Plain 格式的消息 console 会将第一个消息作为指令名, 后续消息作为参数 具体参考 console 文档
     * @return array
     */
    public function cmdExecute(array $command)
    {
        $this->server->push($this->frame->fd,$this->sendCommand('cmdExecute',[
            "command"=> $command,
        ],$this->frame->fd));

    }

    /**
     * 注册命令
     * @param string $name 指令名,注册的指令会直接覆盖已有的指令(包括 console 内置的指令)
     * @param array $alias 指令别名
     * @param string $usage 使用说明
     * @param string $description 命令描述
     * @return array
     */
    public function cmdRegister(string $name, array $alias, string $usage, string $description)
    {
        $this->server->push($this->frame->fd,$this->sendCommand('cmdExecute',compact('name','alias','usage','description'),$this->frame->fd));
    }
}
