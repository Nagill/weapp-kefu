<?php

namespace Com\Kefu;


class Kefu {
    private $token = '';
    private $type = '';
    private $instants = array();
    private $class = '';
    
    /** @throws
     *
     */
    public function __construct($type, $token) {
        $this->token = $token;
        if (empty($type)) {
            throw new KefuException('缺少发送消息的type', 0);
        } else {
            switch ($type) {
                case 'text':
                    $class = 'KefuText';
                    break;
                case 'image':
                    $class = 'KefuImage';
                    break;
                case 'link':
                    $class = 'KefuLink';
                    break;
                case 'miniprogrampage':
                    $class = 'KefuMiniprogrampage';
                    break;
                default:
                    throw new KefuException('不支持的类型消息', 0);
            }
            $this->type  = $type;
            $this->class = $class;
        }
    }
    
    public function set($data) {
        if (in_array($this->class, $this->instants)) {
            $obj = $this->instants[ $this->class ];
        } else {
            $class                          = "Com\\Kefu\\{$this->class}";
            $obj                            = new $class();
            $this->instants[ $this->class ] = $obj;
        }
        
        $obj->set($data, $this->token);
        
    }
    
    public function run() {
        $this->instants[ $this->class ]->run();
    }
}