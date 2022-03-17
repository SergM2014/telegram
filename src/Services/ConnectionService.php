<?php

namespace Src\Services;

use \SimpleTelegramBot\Connection\CurlConnectionService;

class ConnectionService
{
    public static function getObject()
    {
       return new CurlConnectionService();
    }
}
