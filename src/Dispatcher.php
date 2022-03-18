<?php

namespace Src;

use \SimpleTelegramBot\Connection\CurlConnectionService;

class Dispatcher
{
    public function __construct(private array $routes)
    {}

    public function run(CurlConnectionService $connectionService, \stdClass $dto): void
    {
        $item = $this->getRoutingItems($dto);
        $contr = $item;
        $myClass = new $contr();
        $myClass($connectionService, $dto);
    }

    private function getRoutingItems(\stdClass $dto): string
    {
        $keys = array_keys($this->routes);
        $key = array_search($dto->text, $keys);

        if($key === false) return NOT_FOUND_ROUTE;

        $array = array_values($this->routes);
        return $array[$key];
    }
}
