<?php

namespace app\command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use think\facade\Db;


class TaskOrder extends Command
{
    protected static $defaultName = 'task:order';
    protected static $defaultDescription = 'task order';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Name description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $t1 = microtime(true);

        $name = $input->getArgument('name');
        $output->writeln('Hello task:order');

        $total = 0;

        Db::name('order')->field('id,order_no,trade_no,order_status,create_time')->order('id ASC')->chunk(500, function ($list) use (&$total) {
            foreach ($list as $item) {
                $id      = $item['id'];
                $orderId = $item['order_no'];
                $tradeId = $item['trade_no'] ?: '-';
                $status  = $item['order_status'];
                $created = date('Y-m-d H:i:s', $item['create_time']);
                echo sprintf("ID=%d | ORDER-ID=%s | TRADE-ID=%s | STATUS=%d | CREATED=%s", $id, $orderId, $tradeId, $status, $created) . PHP_EOL;
                $total++;
            }
        });

        $t2 = microtime(true);
        echo "处理数据：{$total}条；" . '耗时：' . round($t2 - $t1, 3) . '秒';

        return self::SUCCESS;
    }

}
