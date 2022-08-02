<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/8/2 10:36
 */

namespace vars3cf;


class Swoole
{
    // http服务
    public $http_request;

    // websocket服务
    public $websocket_open;
    public $websocket_message;
    public $websocket_close;
    public $websocket_request;

    /*
     * 构造方法
     */
    public function __construct($config)
    {
        foreach ($config['servers'] as $row) {
            if ($row['name'] == 'http') {
                $http_server = new \Swoole\Http\Server($row['host'], $row['port'], $config['mode']);
                $http_server->set($row['settings']);
                $this->http_request = $row['callbacks']['onRequest'];
                $http_server->on('Request', [$this, 'onRequest']);
                echo "The Http Service Started Successfully!--------" . date('Y-m-d H:i:s') . "\n";
                $http_server->start();
            }
            if ($row['name'] == 'ws') {
                $websocket_server = new \Swoole\WebSocket\Server($row['host'], $row['port'], $config['mode']);
                $websocket_server->set($row['settings']);
                $this->websocket_open = $row['callbacks']['onOpen'];
                $this->websocket_message = $row['callbacks']['onMessage'];
                $this->websocket_close = $row['callbacks']['onClose'];
                $this->websocket_request = $row['callbacks']['onRequest'];

                $websocket_server->on('open', [$this, 'onOpen']);
                $websocket_server->on('message', [$this, 'onMessage']);
                $websocket_server->on('request', [$this, 'onWsRequest']);
                $websocket_server->on('close', [$this, 'onClose']);
                echo "The WebSocket Service Started Successfully!--------" . date('Y-m-d H:i:s') . "\n";
                $websocket_server->start();
            }
        }
    }

    // 监听http请求事件
    public function onRequest($request, $response)
    {
        (new $this->http_request($request, $response));
    }

    // 打开链接
    public function onOpen($server, $request)
    {
        (new $this->websocket_open($server, $request));
    }

    // 接受消息
    public function onMessage($server, $frame)
    {
        (new $this->websocket_message($server, $frame));
    }

    // 关闭链接
    public function onClose($server, $fd)
    {
        (new $this->websocket_close($server, $fd));
    }

    // 监听http请求事件
    public function onWsRequest($request, $response)
    {
        (new $this->websocket_request($request, $response));
    }
}