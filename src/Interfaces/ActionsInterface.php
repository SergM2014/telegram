<?php

namespace Src\Interfaces;

use Src\Services\Dto;

interface ActionsInterface
{
    public function handle(\stdClass $dto): void;
}