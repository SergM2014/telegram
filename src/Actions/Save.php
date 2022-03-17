<?php

namespace Src\Actions;

use Src\Repository\PDORepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Save implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, \stdClass $dto): void
    {
        (new PDORepository())->setUser($dto);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}