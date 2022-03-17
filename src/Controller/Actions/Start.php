<?php

namespace Src\Controller\Actions;

use Src\Services\Dto;
use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Start extends MainController implements ActionsInterface
{
    public function handle(\stdClass $dto): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}