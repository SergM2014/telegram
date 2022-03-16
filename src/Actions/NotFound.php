<?php

namespace Src\Actions;

use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class NotFound extends MainController implements ActionsInterface
{
    public function handle(array $update): void
    {
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=I do not know what to say!'
        );
    }
}
