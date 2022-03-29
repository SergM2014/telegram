<?php

declare(strict_types=1);

namespace Src;

class Dispatcher
{
    use ContainerTrait;

    public function __construct(private array $routes)
    {}

    public function run(Dto $dto): void
    {
        $contr = $this->getRoutingItems($dto);
        $myClass = $this->buildContainer()->get($contr);

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
