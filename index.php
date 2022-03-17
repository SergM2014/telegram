<?php

require_once 'vendor/autoload.php';
require_once 'settings.php';

$dto = \Src\Services\Dto::getObject("php://input");

(new \Src\Application($routes))->run($dto);

