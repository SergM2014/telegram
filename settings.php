<?php

const BOT_TOKEN = '5289780922:AAGvLtDTZZhLDnGnB1ZOzVDWjtoOhXFFWE8';
const BASIC_API_URL = 'https://api.telegram.org/bot'.BOT_TOKEN.'/';
const WEBHOOK_URL = 'https://6gg5t.ml';
const DATA_LOGS = __DIR__ . '/logs.txt';

const HOST = 'nv452691.mysql.tools';
const USER = 'nv452691_db';
const PASSWORD = 'G2W3X5pa';
const NAME_BD = 'nv452691_db';
const NOT_FOUND_ROUTE = \Src\Actions\NotFound::class;

require_once 'routes.php';

function logging($item)
{
    $log = date('Y-m-d H:i:s') . ' ' . print_r($item, true);
    file_put_contents(DATA_LOGS, $log . PHP_EOL, FILE_APPEND);
}