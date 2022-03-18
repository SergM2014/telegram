<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Monolog\Handler\StreamHandler;
use Monolog\Logger;



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

$logger = new Logger('my_logger');
$logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
$logger->info('Message that will be logged');