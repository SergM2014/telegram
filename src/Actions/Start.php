<?php

namespace Src\Actions;

use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Start  implements ActionsInterface
{
    public function handle(CurlConnectionService $connectionService, \stdClass $dto): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}