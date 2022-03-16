<?php

namespace Src\Actions;

class Start implements ActionsInterface
{
    public function handle(object $connectionService,  array $update): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=hi!'
        );
    }
}