<?php

declare(strict_types=1);

require_once 'settings.php';

$update = file_get_contents('php://input');
$update = json_decode($update, true);

$dto = new \Src\Dto(
    $update['message']['text'],
    $update['message']['chat']['id'],
    $update['message']['chat']['first_name'],
    $update['message']['chat']['last_name']
);

(new \Src\Dispatcher($routes))->run($dto);

//var_dump($GLOBALS['services']);