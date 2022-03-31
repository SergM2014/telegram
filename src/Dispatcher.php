<?php

declare(strict_types=1);

namespace Src;

use DI\ContainerBuilder;

class Dispatcher
{
    public function __construct(private array $routes)
    {}

    public function run(Dto $dto): void
    {
        $contr = $this->getRoutingItems($dto);

        $builder = new ContainerBuilder();
        $builder->addDefinitions($_SERVER['DOCUMENT_ROOT'].'/DiSettings.php');
        $container = $builder->build();
        $myClass = $container->get($contr);
        $myClass($dto, $container);
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
