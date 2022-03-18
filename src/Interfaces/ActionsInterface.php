<?php

namespace Src\Interfaces;

use Src\Dto;
use \SimpleTelegramBot\Connection\CurlConnectionService;

interface ActionsInterface
{
    public function __invoke(CurlConnectionService $connectionService, Dto $dto): void;
}