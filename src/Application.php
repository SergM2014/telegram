<?php

namespace Src;

use \SimpleTelegramBot\Connection\CurlConnectionService;

class Application
{
    public function __construct(private array $routes)
    {}

    public function run(CurlConnectionService $connectionService, \stdClass $dto)
    {
        $items = $this->getControllerItems($dto);
        $contr = $items[0];
        $method = $items[1];
        $myClass = new $contr();
        $myClass->$method($connectionService, $dto);
    }

    private function getControllerItems(\stdClass $dto)
    {
        $keys = array_keys($this->routes);
        $key = array_search($dto->text, $keys);

        if($key === false) return NOT_FOUND_ROUTE;

        $array = array_values($this->routes);
        return $array[$key];
    }
}
