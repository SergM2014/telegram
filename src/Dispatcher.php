<?php

declare(strict_types=1);

namespace Src;

use DI\Container;
use \SimpleTelegramBot\Connection\CurlConnectionService;

class Dispatcher
{
    public function __construct(private array $routes)
    {
    }

    public function run(CurlConnectionService $connectionService, Dto $dto): void
    {
        $contr = $this->getRoutingItems($dto);
        $myClass = (new Container())->get($contr);
        $myClass($connectionService, $dto);
    }

    private function getRoutingItems(Dto $dto): string
    {
        $keys = array_keys($this->routes);
        $key = array_search($dto->text, $keys);

        if ($key === false) return NOT_FOUND_ROUTE;

        $array = array_values($this->routes);

        return $array[$key];
    }
}
