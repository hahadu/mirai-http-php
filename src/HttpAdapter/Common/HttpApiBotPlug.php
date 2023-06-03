<?php

namespace Hahadu\MiraiHttp\HttpAdapter\Common;

use Hahadu\MiraiHttp\Kernel\MiraiHttpBaseKernel;

/**
 * 获取插件信息
 */
class HttpApiBotPlug extends MiraiHttpBaseKernel
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
