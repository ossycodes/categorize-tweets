<?php

namespace App\Services\Logs;

use Monolog\Logger;

class LogMonolog
{
    /**
     * Create a custom Monolog instance.
     *
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('custom');
        $logger->pushHandler(new LogHandler());
        $logger->pushProcessor(new LogProcessor());

        return $logger;
    }
}
