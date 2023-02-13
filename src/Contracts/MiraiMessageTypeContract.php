<?php

namespace MiraiHttp\Contracts;

/**
 * 消息类型
 */
class MiraiMessageTypeContract
{

    //消息链类型
    /** @var string 好友消息 */
    const mirai_FriendMessage = 'FriendMessage';
    /** @var string 群消息 */
    const mirai_GroupMessage = 'GroupMessage';
    /** @var string 群临时消息 */
    const mirai_TempMessage = 'TempMessage';
    /** @var string 陌生人消息 */
    const mirai_StrangerMessage = 'StrangerMessage';
    /** @var string 其他客户端消息 */
    const mirai_OtherClientMessage = 'OtherClientMessage';

    //同步消息链类型
    /** @var string 同步好友消息 */
    const mirai_FriendSyncMessage = 'FriendSyncMessage';
    /** @var string 同步群消息 */
    const mirai_GroupSyncMessage = 'GroupSyncMessage';
    /** @var string 同步群临时消息 */
    const mirai_TempSyncMessage = 'TempSyncMessage';
    /** @var string 同步陌生人消息 */
    const mirai_StrangerSyncMessage = 'StrangerSyncMessage';


    //消息类型
    /** @var string Source */
    const mirai_msg_type_Source = 'Source';
    /** @var string Quote */
    const mirai_msg_type_Quote = 'Quote';
    /** @var string At */
    const mirai_msg_type_At = 'At';
    /** @var string AtAll */
    const mirai_msg_type_At_All = 'AtAll';
    /** @var string Face */
    const mirai_msg_type_Face = 'Face';
    /** @var string Plain */
    const mirai_msg_type_Plain = 'Plain';
    /** @var string Image */
    const mirai_msg_type_Image = 'Image';
    /** @var string FlashImage */
    const mirai_msg_type_FlashImage = 'FlashImage';
}
