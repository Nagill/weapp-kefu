# weapp-kefu
微信小程序客服消息模块,基于驱动开发，可以有效解决群发消息的问题，单个类型的消息独立不干扰

## 发送文字消息
    $type = 'text'; // 可选参数，text,link,image,miniprogrampage
    $kefu = new \Com\Kefu($type,$token); //群发消息一般都是群发一种类型的消息的，所以将type加载到构造中
    $data = array(
        'touser'=>'xxxxx',
        'text'=>'您好'
    )
    $kefu->set($data);
    $kefu->run();

## 发送图片消息

    $type = 'image'; // 可选参数，text,link,image,miniprogrampage
    $kefu = new \Com\Kefu($type,$token); //群发消息一般都是群发一种类型的消息的，所以将type加载到构造中
    $data = array(
        'touser'=>'xxxxx',
        'media_id'=>'media_id'
    )
    $kefu->set($data);
    $kefu->run();

## 发送图文消息

    $type = 'link'; // 可选参数，text,link,image,miniprogrampage
    $kefu = new \Com\Kefu($type,$token); //群发消息一般都是群发一种类型的消息的，所以将type加载到构造中
    $data = array(
        'touser'=>'xxxxx',
        'title'=>'你好',
        'description'=>'今天的天气不错',
        'url'=>'https://wwww.xxx.xxx',
        'thumb_url'=>'thumb_image_url'
    )
    $kefu->set($data);
    $kefu->run();

## 发送小程序卡片

    $type = 'miniprogrampage'; // 可选参数，text,link,image,miniprogrampage
    $kefu = new \Com\Kefu($type,$token); //群发消息一般都是群发一种类型的消息的，所以将type加载到构造中
    $data = array(
        'touser'=>'xxxxx',
        'title'=>'xxx小程序',
        'pagepath'=>'/pages/index',
        'thumb_media_id'=>'thumb_media_id',
    )
    $kefu->set($data);
    $kefu->run();