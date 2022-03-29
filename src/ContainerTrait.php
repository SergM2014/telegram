<?php

namespace Src;

use DI\ContainerBuilder;

trait ContainerTrait
{
    private $container;

    public function buildContainer()
    {
        $this->container = $builder = new ContainerBuilder();
        $builder->addDefinitions(CONFIG_FILE);
        $container = $builder->build();

        return $container;
    }
}