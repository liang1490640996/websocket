<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 14:52
 */

namespace app\websocket;


class onMessage
{
    public function __construct($server, $frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    }
}