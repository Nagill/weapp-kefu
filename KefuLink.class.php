<?php

namespace Com\Kefu;

class KefuLink {
    private $touser = '';
    private $token = '';
    private $title = '';
    private $description = '';
    private $url = '';
    private $thumb_url = '';
    
    public function set($data, $token) {
        $this->touser      = $data['touser'];
        $this->token       = $token;
        $this->title       = $data['title'];
        $this->description = $data['description'];
        $this->url         = $data['url'];
        $this->thumb_url   = $data['thumb_url'];
    }
    
    public function run() {
        $helper  = new KefuHelper();
        $url     = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$this->token";
        $msg     = array(
            'touser'  => $this->touser,
            'msgtype' => 'link',
            'link'    => array(
                'title'       => $this->title,
                'description' => $this->description,
                'url'         => $this->url,
                'thumb_url'   => $this->thumb_url,
            ),
        );
        $sendMsg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        
        return json_decode($helper->https_request($url, $sendMsg), TRUE);
    }
}