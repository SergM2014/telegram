<?php

declare(strict_types=1);

namespace Src;

use DI\Container;

class Dispatcher
{
    public function __construct(private array $routes)
    {
    }

    public function run(Dto $dto): void
    {
        $contr = $this->getRoutingItems($dto);
        $myClass = (new Container())->get($contr);
        $myClass($dto);

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
