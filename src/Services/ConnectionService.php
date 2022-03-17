<?php

namespace Src\Services;

use \SimpleTelegramBot\Connection\CurlConnectionService;

class ConnectionService
{
    public static function getService()
    {
       return new CurlConnectionService();
    }
}
