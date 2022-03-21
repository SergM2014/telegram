<?php

declare(strict_types=1);

namespace Src\Services;

use SimpleTelegramBot\Connection\CurlConnectionService;

class ConnectionService
{
    public static function getService(): CurlConnectionService
    {
        return new CurlConnectionService();
    }
}
