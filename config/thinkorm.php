<?php

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            // 数据库类型
            'type' => 'mysql',
            // 服务器地址
            'hostname' => getenv('tporm_db_host'),
            // 数据库名
            'database' => getenv('tporm_db_name'),
            // 数据库用户名
            'username' => getenv('tporm_db_user'),
            // 数据库密码
            'password' => getenv('tporm_db_pass'),
            // 数据库连接端口
            'hostport' => getenv('tporm_db_prot'),
            // 数据库连接参数
            'params' => [
                // 连接超时3秒
                \PDO::ATTR_TIMEOUT => 3,
            ],
            // 数据库编码默认采用utf8
            'charset' => 'utf8',
            // 数据库表前缀
            'prefix' => getenv('tporm_tb_prefix'),
            // 断线重连
            'break_reconnect' => true,
            // 关闭SQL监听日志
            'trigger_sql' => false,
            // 自定义分页类
            'bootstrap' =>  ''
        ],
    ],
];
