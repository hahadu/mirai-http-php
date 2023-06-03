<?php

namespace Hahadu\MiraiHttp\HttpAdapter\Common;

use Hahadu\MiraiHttp\Kernel\MiraiHttpBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * 文件管理
 */
class FileOperate extends MiraiHttpBaseKernel
{

    /**
     * 查看文件列表
     * @param string $id 文件夹id, 空串为根目录
     * @param string|null $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int|null $target 群号或好友QQ号
     * @param int|null $group 群号
     * @param int|null $qq 好友QQ号
     * @param bool $with_download_info 是否携带下载信息，额外请求，无必要不要携带
     * @param int|null $offset 分页偏移
     * @param int|null $size 分页大小
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function fileList(string $id,string $path=null,int $target=null,int $group=null,int $qq=null,bool $with_download_info=false,int $offset=null,int $size=null):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "session_key"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "with_download_info"=> $with_download_info,
            "offset"=> $offset,
            "size"=> $size,
        ];
        return $this->getMethodBot('file/list',$body);
    }

    /**
     * 获取文件信息
     * @param string $id 文件id,空串为根目录
     * @param string|null $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int|null $target 群号或好友QQ号
     * @param int|null $group 群号
     * @param int|null $qq 好友QQ号
     * @param bool $with_download_info 是否携带下载信息，额外请求，无必要不要携带
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function fileInfo(string $id,string $path=null,int $target=null,int $group=null,int $qq=null,bool $with_download_info=false):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "session_key"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "with_download_info"=> $with_download_info,
        ];
        return $this->getMethodBot('file/info',$body);
    }

    /**
     * 创建文件夹
     * @param string $id 父目录id,空串为根目录
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @param string $directory_name 新建文件夹名
     * @return array
     */
    public function fileMkdir(string $id,string $path=null,int $target=null,int $group=null,int $qq=null,string $directory_name):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "directory_name"=> $directory_name,
        ];
        return $this->postMethodBot('file/mkdir',$body);
    }

    /**
     * 删除文件
     * @param string $id 删除文件id
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @return array
     */
    public function fileDelete(string $id,string $path=null,int $target=null,int $group=null,int $qq=null):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
        ];
        return $this->postMethodBot('file/delete',$body);
    }
    /**
     * 移动文件
     * @param string $id 移动文件id
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @param string $move_to 移动目标文件夹id
     * @param string $move_to_path 移动目标文件路径, 文件夹允许重名, 不保证准确, 准确定位使用 moveTo
     * @return array
     */
    public function fileMove(string $id,string $path,int $target=null,int $group=null,int $qq=null,string $move_to=null,string $move_to_path=null):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "moveTo"=> $move_to,
            "moveToPath"=> $move_to_path,
        ];
        return $this->postMethodBot('file/move',$body);
    }
    /**
     * 重命名文件
     * @param string $id 重命名文件id
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @param int $rename_to 新文件名
     * @return array
     */
    public function fileRename(string $id,string $path,int $target=null,int $group=null,int $qq=null,int $rename_to=null):array
    {
        $session_key = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        $body = [
            "sessionKey"=> $session_key,
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "renameTo"=> $rename_to,
        ];
        return $this->postMethodBot('file/rename',$body);
    }


}
