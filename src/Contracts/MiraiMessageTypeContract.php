<?php

namespace Hahadu\MiraiHttp\Contracts;

use Illuminate\Support\Arr;

/**
 * 消息类型
 */
class MiraiMessageTypeContract
{

    //消息链类型
    /** @var string 好友消息 */
    const MIRAI_FRIEND_MESSAGE = 'FriendMessage';
    /** @var string 群消息 */
    const MIRAI_GROUP_MESSAGE = 'GroupMessage';
    /** @var string 群临时消息 */
    const MIRAI_TEMP_MESSAGE = 'TempMessage';
    /** @var string 陌生人消息 */
    const MIRAI_STRANGER_MESSAGE = 'StrangerMessage';
    /** @var string 其他客户端消息 */
    const MIRAI_OTHER_CLIENT_MESSAGE = 'OtherClientMessage';

    //同步消息链类型
    /** @var string 同步好友消息 */
    const MIRAI_FRIEND_SYNC_MESSAGE = 'FriendSyncMessage';
    /** @var string 同步群消息 */
    const MIRAI_GROUP_SYNC_MESSAGE = 'GroupSyncMessage';
    /** @var string 同步群临时消息 */
    const MIRAI_TEMP_SYNC_MESSAGE = 'TempSyncMessage';
    /** @var string 同步陌生人消息 */
    const MIRAI_STRANGER_SYNC_MESSAGE = 'StrangerSyncMessage';


    //消息类型
    /** @var string Source */
    const MIRAI_MSG_TYPE_SOURCE = 'Source';
    /** @var string Quote */
    const MIRAI_MSG_TYPE_QUOTE = 'Quote';
    /** @var string At提及某人 */
    const MIRAI_MSG_TYPE_AT = 'At';
    /** @var string AtAll全体成员 */
    const MIRAI_MSG_TYPE_AT_ALL = 'AtAll';
    /** @var string 原生表情 */
    const MIRAI_MSG_TYPE_FACE = 'Face';
    /** @var string 纯文本 */
    const MIRAI_MSG_TYPE_PLAIN = 'Plain';
    /** @var string 自定义图片 */
    const MIRAI_MSG_TYPE_IMAGE = 'Image';
    /** @var string 闪照 */
    const MIRAI_MSG_TYPE_FLASH_IMAGE = 'FlashImage';
    /** @var string 语音（已弃用） */
    const MIRAI_MSG_TYPE_VOICE = 'Voice';
    /** @var string Xml */
    const MIRAI_MSG_TYPE_XML = 'Xml';
    /** @var string Json */
    const MIRAI_MSG_TYPE_JSON = 'Json';
    /** @var string App */
    const MIRAI_MSG_TYPE_APP = 'App';
    /** @var string 戳一戳消息（消息非动作） */
    const MIRAI_MSG_TYPE_POKE = 'Poke';
    /** @var string 魔法表情骰子 */
    const MIRAI_MSG_TYPE_DICE = 'Dice';
    /** @var string 商城表情 */
    const MIRAI_MSG_TYPE_MARKET_FACE = 'MarketFace';
    /** @var string 音乐分享 */
    const MIRAI_MSG_TYPE_MUSIC_SHARE = 'MusicShare';
    /** @var string 合并转发 */
    const MIRAI_MSG_TYPE_FORWARD_MESSAGE = 'ForwardMessage';
    /** @var string 文件消息 */
    const MIRAI_MSG_TYPE_FILE = 'File';
    /** @var string MiraiCode */
    const MIRAI_MSG_TYPE_MIRAI_CODE = 'MiraiCode';
    /** @var string 语音 */
    const MIRAI_MSG_TYPE_AUDIO = 'Audio';
    /** @var string 魔法表情猜拳 */
    const MIRAI_MSG_TYPE_ROCK_PAPER_SCISSORS = 'RockPaperScissors';

    static public function getMessageType(string $typeKey = self::MIRAI_MSG_TYPE_PLAIN):string
    {
        return Arr::get(self::$map,$typeKey,'未知消息类型:'.$typeKey);
    }

    static public array $map = [
        self::MIRAI_FRIEND_MESSAGE => "好友消息",
        self::MIRAI_GROUP_MESSAGE => "群消息",
        self::MIRAI_TEMP_MESSAGE => "群临时消息",
        self::MIRAI_STRANGER_MESSAGE => "陌生人消息",
        self::MIRAI_OTHER_CLIENT_MESSAGE => "其他客户端消息",
        self::MIRAI_FRIEND_SYNC_MESSAGE => "同步好友消息",
        self::MIRAI_GROUP_SYNC_MESSAGE => "同步群消息",
        self::MIRAI_TEMP_SYNC_MESSAGE => "同步群临时消息",
        self::MIRAI_STRANGER_SYNC_MESSAGE => "同步陌生人消息",
        self::MIRAI_MSG_TYPE_SOURCE => "Source",
        self::MIRAI_MSG_TYPE_QUOTE => "Quote",
        self::MIRAI_MSG_TYPE_AT => "At提及某人",
        self::MIRAI_MSG_TYPE_AT_ALL => "AtAll全体成员",
        self::MIRAI_MSG_TYPE_FACE => "原生表情",
        self::MIRAI_MSG_TYPE_PLAIN => "纯文本",
        self::MIRAI_MSG_TYPE_IMAGE => "自定义图片",
        self::MIRAI_MSG_TYPE_FLASH_IMAGE => "闪照",
        self::MIRAI_MSG_TYPE_VOICE => "语音（已弃用）",
        self::MIRAI_MSG_TYPE_XML => "Xml",
        self::MIRAI_MSG_TYPE_JSON => "Json",
        self::MIRAI_MSG_TYPE_APP => "App",
        self::MIRAI_MSG_TYPE_POKE => "戳一戳消息（消息非动作）",
        self::MIRAI_MSG_TYPE_DICE => "魔法表情骰子",
        self::MIRAI_MSG_TYPE_MARKET_FACE => "商城表情",
        self::MIRAI_MSG_TYPE_MUSIC_SHARE => "音乐分享",
        self::MIRAI_MSG_TYPE_FORWARD_MESSAGE => "合并转发",
        self::MIRAI_MSG_TYPE_FILE => "文件消息",
        self::MIRAI_MSG_TYPE_MIRAI_CODE => "MiraiCode",
        self::MIRAI_MSG_TYPE_AUDIO => "语音",
        self::MIRAI_MSG_TYPE_ROCK_PAPER_SCISSORS => "魔法表情猜拳",
    ];

}
