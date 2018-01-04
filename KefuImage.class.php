<?php

namespace Com\Kefu;

class KefuImage {
    private $touser = '';
    private $media_id = '';
    private $token = '';
    
    public function set($data, $token) {
        $this->touser   = $data['touser'];
        $this->media_id = $data['media_id'];
        $this->token    = $token;
    }
    
    public function run() {
        $helper  = new KefuHelper();
        $url     = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$this->token";
        $msg     = array(
            'touser'  => $this->touser,
            'msgtype' => 'image',
            'image'   => array('media_id' => $this->media_id),
        );
        $sendMsg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        
        return json_decode($helper->https_request($url, $sendMsg), TRUE);
    }
}