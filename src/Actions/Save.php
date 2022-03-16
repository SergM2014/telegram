<?php

namespace Src\Actions;

use Src\Repository\PDORepository;
use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Save extends MainController implements ActionsInterface
{
    public function handle(array $update): void
    {
        (new PDORepository())->setUser($update);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Saved!'
        );
    }
}