<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\ConnectionService;

class ErrorOutput implements ActionsInterface
{
    public function __construct(
        private ConnectionService $connectionService,
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=SORRY! something went wrong!'
        );
    }
}
