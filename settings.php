<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'routes.php';

use Src\Actions\NotFound;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('BOT_TOKEN', $_ENV['BOT_TOKEN']);
define('BASIC_API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
define('WEBHOOK_URL', $_ENV['WEBHOOK_URL']);
define('DATA_LOGS', __DIR__ . '/logs.txt');
define('HOST', $_ENV['HOST']);
define('USER', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWORD']);
define('NAME_BD', $_ENV['NAME_BD']);
define('NOT_FOUND_ROUTE', NotFound::class);

require_once 'bootstrap.php';
