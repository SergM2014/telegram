<?php

namespace Src\Actions;

use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class NotFound extends MainController implements ActionsInterface
{
    public function handle(object $dto): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=I do not know what to say!'
        );
    }
}
