<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;
use DI\ContainerBuilder;

interface ActionsInterface
{
    public function __invoke(Dto $dto): void;
}
