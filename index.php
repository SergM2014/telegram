<?php

declare(strict_types=1);

require_once 'settings.php';

$dto = new \Src\Dto('php://input');
$connectionService = new SimpleTelegramBot\Connection\CurlConnectionService();

(new \Src\Dispatcher($routes))->run($connectionService, $dto);