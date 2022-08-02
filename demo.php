<?php

require_once __DIR__ . '/vendor/autoload.php';

use vars3cf\Swoole;

// 读取配置文件
$config = require_once 'swoole.php';

// 启动服务
new Swoole($config);