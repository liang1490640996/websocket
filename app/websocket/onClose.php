<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 14:54
 */

namespace app\websocket;


class onClose
{
    public function __construct($server, $fd)
    {
        echo "client {$fd} closed\n";
    }
}