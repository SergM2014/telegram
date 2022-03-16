<?php

namespace Src\Actions;

use Src\Repository\PDORepository;

class Save implements ActionsInterface
{
    public function handle(object $connectionService, array $update): void
    {
        PDORepository::setUser($update);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Saved!'
        );
    }
}