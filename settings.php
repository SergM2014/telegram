<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("BOT_TOKEN", $_ENV['BOT_TOKEN']);
define("BASIC_API_URL", 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
define("WEBHOOK_URL", $_ENV['WEBHOOK_URL']);
define("DATA_LOGS",  __DIR__ . '/logs.txt');

define("HOST", $_ENV['HOST']);
define("USER", $_ENV['USER']);
define("PASSWORD", $_ENV['PASSWORD']);
define("NAME_BD", $_ENV['NAME_BD']);
define("NOT_FOUND_ROUTE", \Src\Actions\NotFound::class);

require_once 'routes.php';

function logging($item)
{
    $log = date('Y-m-d H:i:s') . ' ' . print_r($item, true);
    file_put_contents(DATA_LOGS, $log . PHP_EOL, FILE_APPEND);
}