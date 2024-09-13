<?php

use think\facade\Db;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../support/bootstrap.php';


$t1 = microtime(true);

$count = 1000;
$total = 0;
Db::name('order')->chunk($count, function ($data) use ($count, &$total) {
    foreach ($data as $v) {
        echo $v['order_no'] . PHP_EOL;
    }

    $total += $count;
    echo "-----------------------" . PHP_EOL;
});

$t2 = microtime(true);
echo '耗时' . round($t2 - $t1, 3) . '秒';