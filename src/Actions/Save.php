<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use \DI\ContainerBuilder;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

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
        $builder->addDefinitions(CONFIG_FILE);
        $container = $builder->build();
        $class = $container->get($this->userRepository::class);
        $class->createUser($dto);

        $class->createUser($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}
