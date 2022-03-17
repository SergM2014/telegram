<?php

require_once 'vendor/autoload.php';
require_once 'settings.php';

$dto = \Src\Services\Dto::getObject("php://input");
$connectionService = \Src\Services\ConnectionService::getObject();

(new \Src\Application($routes))->run($connectionService, $dto);

