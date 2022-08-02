<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 10:44
 */

namespace app\http;

class onRequest
{
    public function __construct($request, $response)
    {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
    }
}