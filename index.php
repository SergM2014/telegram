<?php

require_once 'vendor/autoload.php';
require_once 'settings.php';

$update = file_get_contents("php://input");
$update = json_decode($update, true);

Src\Factory::create($update['message']['text'])->handle($update['message']['chat']['id']);