<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use DI\Container;
use Src\Repository\UserRepository;
use Src\Interfaces\UserRepositoryInterface;
use Src\Interfaces\ActionsContainerInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Save implements ActionsContainerInterface
{
    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepositoryInterface $userRepository
    )
    {}

    public function __invoke(Dto $dto, Container $container): void
    {
        $container->get($this->userRepository::class)->createUser($dto);

        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}