<?php

namespace Src;

use DI\Container;
use Monolog\Logger;
use Src\Actions\ErrorOutput;
use Monolog\Handler\StreamHandler;

trait ErrorHandling {

    public Logger $logger;

    public function printLog(string $messageToLog): void
    {
        $this->logger = new Logger('my_logger');
        $this->logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
        $this->logger->debug($messageToLog);
    }

    public function processError(string $messageToLog, Dto $dto): void
    {
        $this->printLog($messageToLog);
        $myClass = (new Container())->get(ErrorOutput::class);
        $myClass($dto);
        exit();
    }
}