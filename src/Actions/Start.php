<?php

namespace Src\Actions;

use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Start extends MainController implements ActionsInterface
{
    public function handle(object $dto): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=hi!'
        );
    }
}