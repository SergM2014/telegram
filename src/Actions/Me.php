<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\ActionsInterface;
use Src\Interfaces\UserRepositoryInterface;
use SimpleTelegramBot\Connection\ConnectionService;

class Me implements ActionsInterface
{
    public function __construct(
        private ConnectionService $connectionService,
        private UserRepositoryInterface $userRepository
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $user = $this->userRepository->getUserByChatId($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}
