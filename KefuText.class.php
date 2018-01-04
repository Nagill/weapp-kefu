<?php

namespace Com\Kefu;

class KefuText {
    private $touser = '';
    private $text = '';
    private $token = '';
    
    public function set($data, $token) {
        $this->touser = $data['touser'];
        $this->text   = $data['text'];
        $this->token  = $token;
    }
    
    public function run() {
        $helper  = new KefuHelper();
        $url     = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$this->token";
        $msg     = array(
            'touser'  => $this->touser,
            'msgtype' => 'text',
            'text'    => array('content' => $this->text),
        );
        $sendMsg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        
        return json_decode($helper->https_request($url, $sendMsg), TRUE);
    }
}