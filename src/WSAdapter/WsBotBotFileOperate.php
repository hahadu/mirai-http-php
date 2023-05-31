<?php

namespace MiraiHttp\WSAdapter;

use MiraiHttp\Contracts\MiraiInterfaces\BotFileOperateInterface;
use MiraiHttp\Kernel\MiraiWebSocketBaseKernel;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class WsBotBotFileOperate extends MiraiWebSocketBaseKernel  implements BotFileOperateInterface
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
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function fileList(string $id, string $path = null, int $target = null, int $group = null, int $qq = null, bool $with_download_info = false, int $offset = null, int $size = null)
    {
        $body = [
            "id"=> $id,
            "path"=> $path,
            "target"=> $target,
            "group"=> $group,
            "qq"=> $qq,
            "with_download_info"=> $with_download_info,
            "offset"=> $offset,
            "size"=> $size,
        ];
        $this->server->push($this->frame->fd,$this->sendCommand('fileList',$body,$this->frame->fd));

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
    public function fileInfo(string $id, string $path = null, int $target = null, int $group = null, int $qq = null, bool $with_download_info = false)
    {
        // TODO: Implement fileInfo() method.
    }

    /**
     * 创建文件夹
     * @param string $id 父目录id,空串为根目录
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @param string $directory_name 新建文件夹名
     */
    public function fileMkdir(string $id, string $path = null, int $target = null, int $group = null, int $qq = null, string $directory_name)
    {
        // TODO: Implement fileMkdir() method.
    }

    /**
     * 删除文件
     * @param string $id 删除文件id
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     */
    public function fileDelete(string $id, string $path = null, int $target = null, int $group = null, int $qq = null)
    {
        // TODO: Implement fileDelete() method.
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
     */
    public function fileMove(string $id, string $path, int $target = null, int $group = null, int $qq = null, string $move_to = null, string $move_to_path = null)
    {
        // TODO: Implement fileMove() method.
    }

    /**
     * 重命名文件
     * @param string $id 重命名文件id
     * @param string $path 文件夹路径, 文件夹允许重名, 不保证准确, 准确定位使用 id
     * @param int $target 群号或好友QQ号
     * @param int $group 群号
     * @param int $qq 好友QQ号
     * @param int $rename_to 新文件名
     */
    public function fileRename(string $id, string $path, int $target = null, int $group = null, int $qq = null, int $rename_to = null)
    {
        // TODO: Implement fileRename() method.
    }
}
