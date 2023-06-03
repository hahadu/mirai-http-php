<?php

namespace Hahadu\MiraiHttp\Contracts\MiraiInterfaces;

interface BotApiPlugInterface
{
    /**
     * 获取插件信息
     * @return array
     */
    public function about();
    /**
     * 取所有当前登录账号
     * @return array
     */
    public function botList();

}
