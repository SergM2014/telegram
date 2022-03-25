<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use Monolog\Formatter\LineFormatter;
use SimpleTelegramBot\Connection\CurlConnectionService;
use DI\Container;
use DI\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Save implements ActionsInterface
{
    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepository $userRepository
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions([

            \Psr\Log\LoggerInterface::class => \DI\factory(function () {
                $logger = new Logger('mylog');

                $fileHandler = new StreamHandler('DATA_LOGS', Logger::DEBUG);
                $fileHandler->setFormatter(new LineFormatter());
                $logger->pushHandler($fileHandler);

                return $logger;
            })

        ]);
        $container = $builder->build();

        $class = $container->get($this->userRepository::class);

//       $class = (new Container())->get($this->userRepository::class);
        $class->createUser($dto);
//        $this->userRepository->createUser($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}
