<?php


namespace process;


use support\Log;
use think\facade\Db;
use Workerman\Worker;

class TaskOrder
{
    public function onWorkerStart(Worker $worker)
    {
        dd($worker->id);
        /*Log::info('开始 - 订单处理任务');

        Db::name('order')->field('id,order_no,trade_no,order_status,create_time')->order('id ASC')->chunk(500, function ($list) {
            foreach ($list as $item) {
                $id      = $item['id'];
                $orderId = $item['order_no'];
                $tradeId = $item['trade_no'] ?: '-';
                $status  = $item['order_status'];
                $created = date('Y-m-d H:i:s', $item['create_time']);
                echo sprintf("ID=%d | ORDER-ID=%s | TRADE-ID=%s | STATUS=%d | CREATED=%s", $id, $orderId, $tradeId, $status, $created) . PHP_EOL;
            }
        });

        Log::info('结束 - 订单处理任务');*/
    }

}