<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;

/**
 * 获取插件信息
 */
class HttpApiBotPlug extends MiraiBaseKernel
{

    /**
     * 获取插件信息
     * @return array
     */
    public function about():array
    {
        return $this->getMethodBot('about');
    }

    /**
     * 取所有当前登录账号
     * @return array
     */
    public function botList():array
    {
        return $this->getMethodBot('botList');
    }

}
