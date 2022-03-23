<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Save implements ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void
    {
        (new UserRepository())->createUser($dto);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}
