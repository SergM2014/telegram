<?php

namespace Src\Interfaces;

use \SimpleTelegramBot\Connection\CurlConnectionService;

interface ActionsInterface
{
    public function handle(CurlConnectionService $connectionService,\stdClass $dto): void;
}