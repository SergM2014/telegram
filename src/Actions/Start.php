<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Interfaces\SimpleActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Start implements SimpleActionsInterface
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
