<?php


namespace process;


use Workerman\Crontab\Crontab;
use Workerman\Timer;

class TaskTimer
{
    public function onWorkerStart()
    {
        // 每秒钟执行一次
//        new Crontab('*/1 * * * * *', function () {
//            echo date('Y-m-d H:i:s') . PHP_EOL;
//        });

        // 每隔10秒检查一次数据库
        Timer::add(10, function () {
            echo time() . ' - OK' . PHP_EOL;
        });

    }

}