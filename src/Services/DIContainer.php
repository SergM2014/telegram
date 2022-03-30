<?php

namespace Src\Services;

use DI\ContainerBuilder;

class DIContainer
{
    public function build()
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions(DI_CONFIG_FILE);
        $container = $builder->build();

        return $container;
    }
}