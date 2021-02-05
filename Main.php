<?php

require_once './vendor/autoload.php';

use Symfony\Component\Process\Process;

// 要开启进程名称
$processNames = [
    'Demo01',
    'Demo02',
    'Demo03',
    'Demo04',
    'Demo05'
];

// 进程独立运行，不需要通讯
$processes = [];
foreach ($processNames as $processName) {
    $tempProcess = new Process(['php', './Demo.php', $processName]);

    // 启动异步进程，回调获取子进程数据
    $tempProcess->start(function ($type, $data) {
        if ($type === Process::ERR) {
            echo "Err > " . $data;
        } else {
            echo "Out > " . $data;
        }
    });

    $processes[] = $tempProcess;
}

// 主进程监听子进程结果
while (true) {
    foreach ($processes as $process) {
        $process->getOutput();
    }
}
