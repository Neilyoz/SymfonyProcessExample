<?php
// 常驻进程
while (true) {
    try {
        /*
         * TODO： 相关业务逻辑
         * 可以通过redis从队列里面读取任务执行
         */
        sleep(rand(1, 10)); // 模拟执行相关业务的耗时操作
        echo '进程：' . $argv[1] . '，执行了XXX的任务于 ' . date('Y-m-d H:i:s') . PHP_EOL;
    } catch (Exception $exception) {
        // 记录相关错误日志：
        echo $exception->getMessage() . PHP_EOL;
    }
}
