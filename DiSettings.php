<?php

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Src\Repository\UserRepository;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Src\Interfaces\UserRepositoryInterface;
use SimpleTelegramBot\Connection\ConnectionService;
use SimpleTelegramBot\Connection\CurlConnectionService;
use Src\Actions\ErrorOutput;

return [
    LoggerInterface::class => DI\factory(function () {
        $logger = new Logger('mylog');
        $fileHandler = new StreamHandler(DATA_LOGS, Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    }),
    UserRepositoryInterface::class => DI\get(UserRepository::class),
    ConnectionService::class => DI\get(CurlConnectionService::class),
    ErrorOutput::class => DI\factory(function(
        ConnectionService $connectionService
    ){
        return new ErrorOutput($connectionService);
    })
];