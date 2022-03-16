<?php

namespace Src\Controller;

use SimpleTelegramBot\Connection\CurlConnectionService;

class MainController
{
    public function __construct(protected object $connectionService = new CurlConnectionService())
    { }
}