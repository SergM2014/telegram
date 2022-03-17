<?php

namespace Src\Interfaces;

use \SimpleTelegramBot\Connection\CurlConnectionService;

interface ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService,\stdClass $dto): void;
}