<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'routes.php';

use Src\Actions\NotFound;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('BASIC_API_URL', 'https://api.telegram.org/bot'.$_ENV['BOT_TOKEN'].'/');
define('DATA_LOGS', __DIR__ . '/logs.txt');
define('NOT_FOUND_ROUTE', NotFound::class);

require_once 'bootstrap.php';
