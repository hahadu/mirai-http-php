<?php

namespace MiraiHttp\HttpAdapter\Common;

use MiraiHttp\Kernel\MiraiBaseKernel;

class GroupAnnouncement extends MiraiBaseKernel
{
    /**
     * 获取群公告
     * @param int $id 群号
     * @param int $offset 分页参数
     * @param int $size 分页参数，默认10
     * @return array
     */
    public function annoList(int $id,int $offset=0,int $size=10):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey" => $session_key,
            "id"=> $id,
            "offset"=> $offset,
            "size"=> $size,
        ];
        return $this->getMethodBot('anno/list',$body);
    }

    /**
     * 发布群公告
     * @param int $target 群号
     * @param string $content 公告内容
     * @param bool $send_to_new_member 是否发送给新成员
     * @param bool $pinned 是否置顶
     * @param bool $show_edit_card 是否显示群成员修改群名片的引导
     * @param bool $show_popup 是否自动弹出
     * @param bool $require_confirmation 是否需要群成员确认
     * @param string $image_url 公告图片url
     * @param string $image_path 公告图片本地路径
     * @param string $image_base64 公告图片base64编码
     * @return array
     */
    public function annoPublish(int $target,string $content,string $image_url,string $image_path,string $image_base64,bool $send_to_new_member=false,bool $pinned=false,bool $show_edit_card=false,bool $show_popup=false,bool $require_confirmation=false):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey" => $session_key,
            "target"=> $target,
            "content"=> $content,
            "sendToNewMember"=> $send_to_new_member,
            "pinned"=> $pinned,
            "showEditCard"=> $show_edit_card,
            "showPopup"=> $show_popup,
            "requireConfirmation"=> $require_confirmation,
            "imageUrl"=> $image_url,
            "imagePath"=> $image_path,
            "imageBase64"=> $image_base64,
        ];
        return $this->postMethodBot('anno/publish',$body);
    }

    /**
     * 发布群公告
     * @param int $id 群号
     * @param string $fid 群公告唯一id
     * @return array
     */
    public function annoDelete(int $id,string $fid):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey" => $session_key,
            "id"=> $id,
            "fid"=> $fid,
        ];
        return $this->postMethodBot('anno/delete',$body);
    }


}
