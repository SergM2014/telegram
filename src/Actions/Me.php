<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\ContainerTrait;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Me implements ActionsInterface
{
    use ContainerTrait;

    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepository $userRepository
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $user = $this->buildContainer()->get($this->userRepository::class)->getUserByChatId($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}
