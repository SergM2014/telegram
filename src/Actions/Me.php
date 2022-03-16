<?php

namespace Src\Actions;

use Src\Repository\PDORepository;
use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Me extends MainController implements ActionsInterface
{
    public function handle(array $update): void
    {
        $user = (new PDORepository())->getUserByChatId($update['message']['chat']['id']);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}