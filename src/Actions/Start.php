<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Start implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}
