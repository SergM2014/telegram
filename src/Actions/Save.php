<?php

namespace Src\Actions;

use Src\DataBase;

class Save implements ActionsInterface
{
    public function handle(object $connectionService, array $update): void
    {
        DataBase::setUser($update);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Saved!'
        );
    }
}