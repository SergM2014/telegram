<?php

namespace Src\Actions;

use Src\Dto;
use Src\Repository\PDORepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Save implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void
    {
        (new PDORepository())->setUser($dto);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}