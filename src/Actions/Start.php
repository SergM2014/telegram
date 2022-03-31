<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Start implements ActionsInterface
{
    public function __construct(
        private CurlConnectionService $connectionService,
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}
