<?php

namespace Hahadu\MiraiHttp\HttpAdapter\Common;

use Hahadu\MiraiHttp\Kernel\MiraiHttpBaseKernel;

/**
 * 多媒体文件上传
 */
class UploadFile extends MiraiHttpBaseKernel
{
    /**
     * 图片文件上传
     * @param string $type "friend" 或 "group" 或 "temp"
     * @param $img 图片文件
     * @return array
     */
    public function uploadimage($img,string $type='group'):array
    {
        throw_unless(in_array($type,["friend" , "group" , "temp"]),\Exception::class,'上传类型不支持："friend" , "group" , "temp"');
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "type"=> $type,
            "img"=> $img,
        ];
        return $this->setHeads(['content-type'=>'multipart/form-data'])->postMethodBot('uploadImage',$body);
    }

    /**
     * 语音文件上传
     * @param string $type 当前仅支持 "group"
     * @param $voice 语音文件
     * @return array
     */
    public function uploadvoice($voice,string $type='group'):array
    {
        throw_unless($type=='group',\Exception::class,'type仅支持group');
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "type"=> $type,
            "voice"=> $voice,
        ];
        return $this->setHeads(['content-type'=>'multipart/form-data'])->postMethodBot('uploadVoice',$body);
    }
    /**
     * 群文件上传
     * @param string $type 当前仅支持 "group"
     * @param int $target 上传目标群号
     * @param string $path 上传目录的id, 空串为上传到根目录
     * @param $file 上传的文件
     * @return array
     */
    public function fileUpload(int $target,string $path,$file,string $type='group'):array
    {
        throw_unless($type=='group',\Exception::class,'type仅支持group');
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "type"=> $type,
            "target"=> $target,
            "path"=> $path,
            "file"=> $file,
        ];
        return $this->postMethodBot('file/upload',$body);
    }


}
