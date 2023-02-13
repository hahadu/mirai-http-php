<?php

namespace MiraiHttp\Contracts;
use Hahadu\Reflector\Reflection;
use ReflectionClass;
use ReflectionClassConstant;

/**
 * 事件类型
 */
class MiraiEventTypeContract
{
    //bot事件
    /** @var string Bot登录成功 */
    const MIRAI_BOT_ON_LINE_EVENT = 'BotOnlineEvent';
    /** @var string Bot主动离线 */
    const MIRAI_BOT_OFFLINE_EVENT_ACTIVE = 'BotOfflineEventActive';
    /** @var string Bot被挤下线 */
    const MIRAI_BOT_OFFLINE_EVENT_FORCE = 'BotOfflineEventForce';
    /** @var string Bot被服务器断开或因网络问题而掉线 */
    const MIRAI_BOT_OFFLINE_EVENT_DROPPED = 'BotOfflineEventDropped';
    /** @var string Bot主动重新登录 */
    const MIRAI_BOT_RE_LOGIN_EVENT = 'BotReloginEvent';

    //好友事件
    /** @var string 好友输入状态改变 */
    const MIRAI_FRIEND_INPUT_STATUS_CHANGED_EVENT = 'FriendInputStatusChangedEvent';
    /** @var string 好友昵称改变 */
    const MIRAI_FRIEND_NICK_CHANGED_EVENT = 'FriendNickChangedEvent';

    //群事件
    /** @var string Bot在群里的权限被改变. (操作人一定是群主) */
    const MIRAI_BOT_GROUP_PERMISSION_CHANGE_EVENT = 'BotGroupPermissionChangeEvent';
    /** @var string Bot被禁言 */
    const MIRAI_BOT_MUTE_EVENT = 'BotMuteEvent';
    /** @var string Bot被取消禁言 */
    const MIRAI_BOT_UNMUTE_EVENT = 'BotUnmuteEvent';
    /** @var string Bot加入了一个新群 */
    const MIRAI_BOT_JOIN_GROUP_EVENT = 'BotJoinGroupEvent';
    /** @var string Bot主动退出一个群 */
    const MIRAI_BOT_LEAVE_EVENT_ACTIVE = 'BotLeaveEventActive';
    /** @var string Bot被踢出一个群 */
    const MIRAI_BOT_LEAVE_EVENT_KICK = 'BotLeaveEventKick';
    /** @var string Bot因群主解散群而退出群, (操作人一定是群主) */
    const MIRAI_BOT_LEAVE_EVENT_DISBAND = 'BotLeaveEventDisband';
    /** @var string 群消息撤回 */
    const MIRAI_GROUP_RECALL_EVENT = 'GroupRecallEvent';
    /** @var string 群内消息撤回 */
    const MIRAI_FRIEND_RECALL_EVENT = 'FriendRecallEvent';
    /** @var string 戳一戳事件 */
    const MIRAI_NUDGE_EVENT = 'NudgeEvent';
    /** @var string 某个群名称改变 */
    const MIRAI_GROUP_NAME_CHANGE_EVENT = 'GroupNameChangeEvent';
    /** @var string 某群入群公告改变 */
    const MIRAI_GROUP_ENTRANCE_ANNOUNCEMENT_CHANGE_EVENT = 'GroupEntranceAnnouncementChangeEvent';
    /** @var string 全群禁言事件 */
    const MIRAI_GROUP_MUTE_ALL_EVENT = 'GroupMuteAllEvent';
    /** @var string 匿名聊天事件 */
    const MIRAI_GROUP_ALLOW_ANONYMOUS_CHAT_EVENT = 'GroupAllowAnonymousChatEvent';
    /** @var string 坦白说 */
    const mirai_Group_Allow_Confess_Talk_Event = 'GroupAllowConfessTalkEvent';
    /** @var string 允许群员邀请好友加群 */
    const MIRAI_GROUP_ALLOW_MEMBER_INVITE_EVENT = 'GroupAllowMemberInviteEvent';
    /** @var string 新人入群的事件 */
    const MIRAI_MEMBER_JOIN_EVENT = 'MemberJoinEvent';
    /** @var string 成员被踢出群（该成员不是Bot） */
    const MIRAI_MEMBER_LEAVE_EVENT_KICK = 'MemberLeaveEventKick';
    /** @var string 成员主动离群（该成员不是Bot） */
    const MIRAI_MEMBER_LEAVE_EVENT_QUIT = 'MemberLeaveEventQuit';
    /** @var string 群名片改动 */
    const MIRAI_MEMBER_CARD_CHANGE_EVENT = 'MemberCardChangeEvent';
    /** @var string 群头衔改动（只有群主有操作限权） */
    const MIRAI_MEMBER_SPECIAL_TITLE_CHANGE_EVENT = 'MemberSpecialTitleChangeEvent';
    /** @var string 成员权限改变的事件（该成员不是Bot） */
    const MIRAI_MEMBER_PERMISSION_CHANGE_EVENT = 'MemberPermissionChangeEvent';
    /** @var string 群成员被禁言事件（该成员不是Bot） */
    const MIRAI_MEMBER_MUTE_EVENT = 'MemberMuteEvent';
    /** @var string 群成员被取消禁言事件（该成员不是Bot） */
    const MIRAI_MEMBER_UNMUTE_EVENT = 'MemberUnmuteEvent';
    /** @var string 群员称号改变 */
    const MIRAI_MEMBER_HONOR_CHANGE_EVENT = 'MemberHonorChangeEvent';

    //申请事件
    /** @var string 添加好友申请 */
    const MIRAI_NEW_FRIEND_REQUEST_EVENT = 'NewFriendRequestEvent';
    /** @var string 用户入群申请（Bot需要有管理员权限） */
    const MIRAI_MEMBER_JOIN_REQUEST_EVENT = 'MemberJoinRequestEvent';
    /** @var string Bot被邀请入群申请 */
    const MIRAI_BOT_INVITED_JOIN_GROUP_REQUEST_EVENT = 'BotInvitedJoinGroupRequestEvent';

    //其他客户端事件
    /** @var string 其他客户端上线 */
    const MIRAI_OTHER_CLIENT_ONLINE_EVENT = 'OtherClientOnlineEvent';
    /** @var string 其他客户端下线 */
    const MIRAI_OTHER_CLIENT_OFFLINE_EVENT = 'OtherClientOfflineEvent';

    // 命令事件
    /** @var string 命令被执行 */
    const MIRAI_COMMAND_EXECUTED_EVENT = 'CommandExecutedEvent';

    static public array $map = [
        self::MIRAI_BOT_ON_LINE_EVENT => "Bot登录成功",
        self::MIRAI_BOT_OFFLINE_EVENT_ACTIVE => "Bot主动离线",
        self::MIRAI_BOT_OFFLINE_EVENT_FORCE => "Bot被挤下线",
        self::MIRAI_BOT_OFFLINE_EVENT_DROPPED => "Bot被服务器断开或因网络问题而掉线",
        self::MIRAI_BOT_RE_LOGIN_EVENT => "Bot主动重新登录",
        self::MIRAI_FRIEND_INPUT_STATUS_CHANGED_EVENT => "好友输入状态改变",
        self::MIRAI_FRIEND_NICK_CHANGED_EVENT => "好友昵称改变",
        self::MIRAI_BOT_GROUP_PERMISSION_CHANGE_EVENT => "Bot在群里的权限被改变. (操作人一定是群主)",
        self::MIRAI_BOT_MUTE_EVENT => "Bot被禁言",
        self::MIRAI_BOT_UNMUTE_EVENT => "Bot被取消禁言",
        self::MIRAI_BOT_JOIN_GROUP_EVENT => "Bot加入了一个新群",
        self::MIRAI_BOT_LEAVE_EVENT_ACTIVE => "Bot主动退出一个群",
        self::MIRAI_BOT_LEAVE_EVENT_KICK => "Bot被踢出一个群",
        self::MIRAI_BOT_LEAVE_EVENT_DISBAND => "Bot因群主解散群而退出群, (操作人一定是群主)",
        self::MIRAI_GROUP_RECALL_EVENT => "群消息撤回",
        self::MIRAI_FRIEND_RECALL_EVENT => "群内消息撤回",
        self::MIRAI_NUDGE_EVENT => "戳一戳事件",
        self::MIRAI_GROUP_NAME_CHANGE_EVENT => "某个群名称改变",
        self::MIRAI_GROUP_ENTRANCE_ANNOUNCEMENT_CHANGE_EVENT => "某群入群公告改变",
        self::MIRAI_GROUP_MUTE_ALL_EVENT => "全群禁言事件",
        self::MIRAI_GROUP_ALLOW_ANONYMOUS_CHAT_EVENT => "匿名聊天事件",
        self::mirai_Group_Allow_Confess_Talk_Event => "坦白说",
        self::MIRAI_GROUP_ALLOW_MEMBER_INVITE_EVENT => "允许群员邀请好友加群",
        self::MIRAI_MEMBER_JOIN_EVENT => "新人入群的事件",
        self::MIRAI_MEMBER_LEAVE_EVENT_KICK => "成员被踢出群（该成员不是Bot）",
        self::MIRAI_MEMBER_LEAVE_EVENT_QUIT => "成员主动离群（该成员不是Bot）",
        self::MIRAI_MEMBER_CARD_CHANGE_EVENT => "群名片改动",
        self::MIRAI_MEMBER_SPECIAL_TITLE_CHANGE_EVENT => "群头衔改动（只有群主有操作限权）",
        self::MIRAI_MEMBER_PERMISSION_CHANGE_EVENT => "成员权限改变的事件（该成员不是Bot）",
        self::MIRAI_MEMBER_MUTE_EVENT => "群成员被禁言事件（该成员不是Bot）",
        self::MIRAI_MEMBER_UNMUTE_EVENT => "群成员被取消禁言事件（该成员不是Bot）",
        self::MIRAI_MEMBER_HONOR_CHANGE_EVENT => "群员称号改变",
        self::MIRAI_NEW_FRIEND_REQUEST_EVENT => "添加好友申请",
        self::MIRAI_MEMBER_JOIN_REQUEST_EVENT => "用户入群申请（Bot需要有管理员权限）",
        self::MIRAI_BOT_INVITED_JOIN_GROUP_REQUEST_EVENT => "Bot被邀请入群申请",
        self::MIRAI_OTHER_CLIENT_ONLINE_EVENT => "其他客户端上线",
        self::MIRAI_OTHER_CLIENT_OFFLINE_EVENT => "其他客户端下线",
        self::MIRAI_COMMAND_EXECUTED_EVENT => "命令被执行",
    ];

}
