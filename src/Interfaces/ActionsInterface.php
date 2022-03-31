<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;

interface ActionsInterface
{
    public function __invoke(Dto $dto): void;
}