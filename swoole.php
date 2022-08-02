<?php

// +----------------------------------------------------------------------
// | Swoole 配置示例 (目前只能开启一个服务http|websocket)
// +----------------------------------------------------------------------

return [
    'mode' => SWOOLE_PROCESS,
    'servers' => [
        // http服务配置示例
        /*[
            'name' => 'http',
            'host' => '0.0.0.0',
            'port' => 9501,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                'onRequest' => \app\http\onRequest::class,
            ],
            'settings' => [
                'daemonize' => 0,
                'worker_num' => 2,
                'socket_buffer_size' => 128 * 1024 *1024,
                'buffer_output_size' => 10 * 1024 * 1024,
            ],
        ],*/
        // websocket服务配置示例
        [
            'name' => 'ws',
            'host' => '0.0.0.0',
            'port' => 9502,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                'onOpen' => \app\websocket\onOpen::class,
                'onMessage' => \app\websocket\onMessage::class,
                'onClose' => \app\websocket\onClose::class,
                'onRequest' => \app\websocket\onRequest::class,
            ],
            'settings' => [
                'daemonize' => 0,
                'worker_num' => 2,
                'socket_buffer_size' => 128 * 1024 *1024,
                'buffer_output_size' => 10 * 1024 * 1024,
            ],
        ],
    ],
];