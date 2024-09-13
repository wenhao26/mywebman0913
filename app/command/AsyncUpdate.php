<?php

namespace app\command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use think\facade\Db;


class AsyncUpdate extends Command
{
    protected static $defaultName = 'async:update';
    protected static $defaultDescription = 'async update';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('异步更新1')
            ->setDescription('异步更新2')
            ->setHelp('异步更新3')
            ->addOption('table', null, InputArgument::OPTIONAL, '--table {name}')
            ->addArgument('name', InputArgument::OPTIONAL, 'Name description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $t1 = microtime(true);

        $name = $input->getArgument('name');
        $output->writeln('Hello async:update');

        echo $name . PHP_EOL;
        sleep(2);

        $count = 500;
        $total = 0;
        Db::name('order')->chunk($count, function ($data) use (&$total) {
            foreach ($data as $v) {
               echo $v['order_no'] . PHP_EOL;
            }

            $total += 500;
            echo '------------' . PHP_EOL;
        });

        $t2 = microtime(true);
        echo '耗时' . round($t2 - $t1, 3) . '秒';

        return self::SUCCESS;
    }

}
