<?php

require_once 'vendor/autoload.php';
require_once 'settings.php';

$dto = \Src\Services\Dto::getObject("php://input");

Src\Factory::create($dto->text)->handle($dto);