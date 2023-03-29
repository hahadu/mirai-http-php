<?php

namespace MiraiHttp\WSAdapter;

use MiraiHttp\Contracts\MiraiInterfaces\BotAccountInterface;
use MiraiHttp\Kernel\MiraiWebSocketBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class WSBotAccount extends MiraiWebSocketBaseKernel
{


    /**
     * 获取bot的好友列表
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function friendList():void
    {
        $list = [];
        $this->server->push($this->frame->fd,$this->sendCommand('friendList',$list,$this->frame->fd));
    }

    /**
     * 获取群列表
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function groupList():void
    {
        $list = [];
        $this->server->push($this->frame->fd,$this->sendCommand('groupList',$list,$this->frame->fd));
    }

    /**
     * 获取bot指定群中的成员列表
     * @param string $target 群id
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function groupMemberList(string $target):void
    {
        $list = [];
        $this->server->push($this->frame->fd,$this->sendCommand('memberList',$list,$this->frame->fd));
    }

    /**
     * 获取最新群成员列表
     * @param string $target 群id
     * @param array|null $member_ids 群成员账号, 为空表示获取所有
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function groupLatestMemberList(string $target, array $member_ids = null):void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('latestMemberList',['target'=>$target,'member_ids'=>$member_ids],$this->frame->fd));
    }

    /**
     * 获取bot资料
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function botProfile():void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('botProfile',[],$this->frame->fd));
    }

    /**
     * 获取好友资料
     * @param int $target 指定好友账号
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function friendProfile(int $target): void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('botProfile',['target'=>$target],$this->frame->fd));
    }

    /**
     * 获取群成员资料
     * @param int $target 群id
     * @param int $member_id 群成员QQ号码
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function memberProfile(int $target, int $member_id): void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('botProfile',['target'=>$target,'member_id'=>$member_id],$this->frame->fd));
    }

    /**
     * 获取QQ用户资料
     * @param int $target 要查询的QQ号码
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function userProfile(int $target): void
    {
        $this->server->push($this->frame->fd,$this->sendCommand('botProfile',['target'=>$target],$this->frame->fd));
    }
}
