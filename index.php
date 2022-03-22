<?php

declare(strict_types=1);

require_once 'settings.php';

$dto = new \Src\Dto('php://input');
$connectionService = \Src\Services\ConnectionService::getService();

(new \Src\Dispatcher($routes))->run($connectionService, $dto);