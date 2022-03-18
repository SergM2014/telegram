<?php

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class NotFound implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=I do not know what to say!'
        );
    }
}
