<?php

require_once 'vendor/autoload.php';
require_once 'settings.php';

$connectionService = new SimpleTelegramBot\Connection\CurlConnectionService();

$update = file_get_contents("php://input");
$update = json_decode($update, true);

Src\Factory::create($update['message']['text'])->handle($connectionService, $update['message']['chat']['id']);