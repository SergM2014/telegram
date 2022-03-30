<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;
use DI\Container;

interface ActionsContainerInterface
{
    public function __invoke(Dto $dto, Container $container): void;
}