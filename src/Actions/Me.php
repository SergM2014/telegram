<?php

namespace Src\Actions;

use Src\Repository\PDORepository;
use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Me extends MainController implements ActionsInterface
{
    public function handle(object $dto): void
    {
        $user = (new PDORepository())->getUserByChatId($dto->chatId);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}