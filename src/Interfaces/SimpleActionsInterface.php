<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;

interface SimpleActionsInterface
{
    public function __invoke(Dto $dto): void;
}