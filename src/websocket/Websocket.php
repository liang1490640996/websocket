<?php
/**
 * Created by PhpStorm.
 * User: lmg
 * Date: 2022/7/22 16:02
 */

namespace vars3cf;

class Websocket
{
    /**
     * @var object $server 服务句柄
     */
    public $server;

    /**
     * Websocket constructor. 构造方法
     * @param $host
     * @param $port
     * @param int[] $settings
     */
    public function __construct($host = '0.0.0.0', $port = 9501, $settings = ['daemonize' => 0])
    {
        // 创建websocket服务
        $this->server = new \Swoole\WebSocket\Server($host, $port);
        // 设置服务器运行参数
        $this->server->set($settings);
        echo "The WebSocket Service Started Successfully!--------" . date('Y-m-d H:i:s') . "\n";
    }

    // 启动服务
    public function onStart()
    {
        $this->server->on('open', [$this, 'onOpen']);
        $this->server->on('message', [$this, 'onMessage']);
        $this->server->on('request', [$this, 'onRequest']);
        $this->server->on('task', [$this, 'onTask']);
        $this->server->on('finish', [$this, 'onFinish']);
        $this->server->on('close', [$this, 'onClose']);
        // 启动服务
        $this->server->start();
    }

    // 打开链接
    public function onOpen($server, $request)
    {
    }

    // 接受消息
    public function onMessage($server, $frame)
    {
    }

    // 关闭链接
    public function onClose($server, $fd)
    {
    }

    // 监听http请求事件
    public function onRequest($request, $response)
    {
    }

    // 处理异步任务(此回调函数在task进程中执行)
    public function onTask($server, $task)
    {
    }

    // 处理异步任务的结果(此回调函数在worker进程中执行)
    public function onFinish($server, $task_id, $data)
    {
    }
}