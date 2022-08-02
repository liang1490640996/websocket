<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 14:51
 */

namespace app\websocket;


class onOpen
{
    public function __construct($server, $request)
    {
        echo "server: handshake success with fd {$request->fd}-------- " . date('Y-m-d H:i:s') . "\n";
    }
}