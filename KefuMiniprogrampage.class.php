<?php

namespace Com\Kefu;

class KefuMiniprogrampage {
    private $touser = '';
    private $title = '';
    private $pagepath = '';
    private $thumb_media_id = '';
    private $token = '';
    
    public function set($data, $token) {
        $this->touser         = $data['touser'];
        $this->token          = $token;
        $this->title          = $data['title'];
        $this->pagepath       = $data['pagepath'];
        $this->thumb_media_id = $data['thumb_media_id'];
    }
    
    public function run() {
        $helper  = new KefuHelper();
        $url     = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$this->token";
        $msg     = array(
            'touser'          => $this->touser,
            'msgtype'         => 'miniprogrampage',
            'miniprogrampage' => array(
                'title'          => $this->title,
                'pagepath'       => $this->pagepath,
                'thumb_media_id' => $this->thumb_media_id,
            ),
        );
        $sendMsg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        
        return json_decode($helper->https_request($url, $sendMsg), TRUE);
    }
    
}