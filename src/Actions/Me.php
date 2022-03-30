<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use DI\Container;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsContainerInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Me implements ActionsContainerInterface
{
    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepository $userRepository
    )
    {}

    public function __invoke(Dto $dto, Container $container): void
    {
        $user = $container->get($this->userRepository::class)->getUserByChatId($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}
