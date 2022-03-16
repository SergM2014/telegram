<?php

namespace Src\Actions;

class NotFound implements ActionsInterface
{
    public function handle(object $connectionService, array $update): void
    {
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=I do not know what to say!'
        );
    }
}
