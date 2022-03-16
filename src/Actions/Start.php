<?php

namespace Src\Actions;

use Src\Interfaces\ActionsInterface;

class Start implements ActionsInterface
{
    public function handle(object $connectionService,  array $update): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=hi!'
        );
    }
}