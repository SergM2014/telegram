<?php

namespace Src\Actions;

use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Start  implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, \stdClass $dto): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}