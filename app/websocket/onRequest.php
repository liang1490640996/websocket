<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 14:55
 */

namespace app\websocket;


class onRequest
{
    public function __construct($request, $response)
    {
        $response->end('request success');
    }
}