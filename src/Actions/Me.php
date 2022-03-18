<?php

namespace Src\Actions;

use Src\Dto;
use Src\Repository\PDORepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Me implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void
    {
        $user = (new PDORepository())->getUserByChatId($dto->chatId);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}