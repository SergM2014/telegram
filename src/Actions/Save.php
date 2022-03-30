<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;
use Src\Services\DIContainer;

class Save implements ActionsInterface
{
    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepository $userRepository
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $container = (new DIContainer())->build();
        $class = $container->get($this->userRepository::class);
        $class->createUser($dto);

        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}
