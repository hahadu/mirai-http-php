<?php

namespace MiraiHttp\Contracts;

class MiraiHttpApiContract
{
    /** @var int 正常 */
    const SUCCESS = 0;

    /** @var int 错误的verify key */
    const MIRAI_AUTH_VERIFY_KEY_FAIL = 1;

    /** @var int 指定的Bot不存在 */
    const MIRAI_BOT_ACCOUNT_NOT_EXIST = 2;

    /** @var int session过期或不存在 */
    const MIRAI_BOT_SESSION_NOT_EXIST = 3;

    /** @var int Session未认证(未激活) */
    const MIRAI_BOT_SESSION_NOT_VERIFY_ILLEGAL_ALLOW = 4;

    /** @var int 发送消息目标不存在(指定对象不存在) */
    const MIRAI_BOT_SEND_ELEMENT_NOT_EXIST = 5;

    /** @var int 指定文件不存在，出现于发送本地图片 */
    const MIRAI_BOT_SEND_FILE_NOT_EXIST_ALLOW = 6;

    /** @var int 无操作权限，指Bot没有对应操作的限权 */
    const MIRAI_BOT_OPERATE_NOT_AUTHORITY_BOT_AUTH_ALLOW = 10;

    /** @var int Bot被禁言，指Bot当前无法向指定群发送消息 */
    const MIRAI_BOT_AUTH_BANNED_POST_ALLOW = 20;

    /** @var int 消息过长 */
    const MIRAI_BOT_SEND_MESSAGE_LONG_OVER_LENGTH = 30;

    /** @var int 错误的访问，如参数错误等 */
    const MIRAI_BOT_PARAMS_INVALID = 400;

    static public array $map = [
        self::SUCCESS => '成功',
        self::MIRAI_AUTH_VERIFY_KEY_FAIL => '错误的verify key',
        self::MIRAI_BOT_ACCOUNT_NOT_EXIST => '指定的Bot不存在',
        self::MIRAI_BOT_SESSION_NOT_EXIST => 'Session失效或不存在',
        self::MIRAI_BOT_SESSION_NOT_VERIFY_ILLEGAL_ALLOW => 'Session未认证(未激活)',
        self::MIRAI_BOT_SEND_ELEMENT_NOT_EXIST => '发送消息目标不存在(指定对象不存在)',
        self::MIRAI_BOT_SEND_FILE_NOT_EXIST_ALLOW => '指定文件不存在，出现于发送本地图片',
        self::MIRAI_BOT_OPERATE_NOT_AUTHORITY_BOT_AUTH_ALLOW => '无操作权限，指Bot没有对应操作的限权',
        self::MIRAI_BOT_AUTH_BANNED_POST_ALLOW => 'Bot被禁言，指Bot当前无法向指定群发送消息',
        self::MIRAI_BOT_SEND_MESSAGE_LONG_OVER_LENGTH => '消息过长',
        self::MIRAI_BOT_PARAMS_INVALID => '错误的访问，如参数错误等',
    ];

}
