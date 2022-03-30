<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

return [
    Logger::class => DI\factory(function () {
        $logger = new Logger('mylog');
        $fileHandler = new StreamHandler(DATA_LOGS, Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    }),

    \Src\Interfaces\UserRepositoryInterface::class =>DI\create(\Src\Repository\UserRepository::class)
];