<?php

namespace Src;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

trait Logging {

    public Logger $logger;

    public function makeLog($message): void
    {
        $this->logger = new Logger('my_logger');
        $this->logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
        $this->logger->info($message);
    }
}