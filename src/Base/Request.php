<?php

namespace MiraiHttp\Base;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as guzzleRequest;

/**
 * base request class
 */
class Request
{

    protected const MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY = 'mirai_q_bot_session_';
    protected $qq;
    protected $verifyKey;
    public function __construct($qq=null,$verifyKey=null)
    {
        if(is_null($qq)){
            $qq = config('miraibot.default_member');
        }

        $this->qq = $qq;
        $this->verifyKey = $verifyKey??config('miraibot.verify_key');

    }

    public function getBot(string $uri,array $body):mixed
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/plain'
        ];

        $get_str = '';
        foreach ($body as $key=>$value) {
            $get_str = $key.'='.$value . '&';
        }
        $url = $this->getHost() . $uri .'?' .rtrim($get_str,'&');
        $request = new guzzleRequest('GET', $url,$headers);
        $res = $client->sendAsync($request)->wait();
        $body = json_decode($res->getBody(),true);
        if(in_array($body['code'],[3,4])){
            cache()->delete(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        }else{
            $this->refetSessionCache($uri);

        }
        return $body;
    }

    public function postBot(string $uri,array $body):mixed
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/plain'
        ];

        $request = new guzzleRequest('POST', $this->getHost() . $uri,$headers,json_encode($body,JSON_UNESCAPED_UNICODE));
        $res = $client->sendAsync($request)->wait();
        $body = json_decode($res->getBody(),true);
        if(in_array($body['code'],[3,4])){
            cache()->delete(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
        }
        $this->refetSessionCache($uri);
        return $body;
    }

    protected function getHost(){
        return config('miraibot.protocol','http').'://'.config('miraibot.server_host').":".config('miraibot.port',8080).DIRECTORY_SEPARATOR;
    }

    protected function refetSessionCache(string $uri){
        if($uri!='verify'){
            $sessionKey = cache()->get(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq);
            cache()->set(self::MIRAI_BOT_Q_MEMBER_BIND_CACHE_SESSION_KEY.$this->qq,$sessionKey,1800);
        }
    }


}

