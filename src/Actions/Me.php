<?php

namespace Src\Actions;

use Src\DataBase;

class Me implements ActionsInterface
{
    public function handle(object $connectionService, array $update): void
    {
        $user = DataBase::getUserByChatId($update['message']['chat']['id']);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
    }
}