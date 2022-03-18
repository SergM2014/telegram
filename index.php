<?php

require_once 'settings.php';

$dto = Src\Dto::getObject("php://input");
$connectionService = \Src\Services\ConnectionService::getService();

(new \Src\Dispatcher($routes))->run($connectionService, $dto);

