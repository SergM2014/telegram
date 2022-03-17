<?php

namespace Src\Interfaces;

use Src\Services\Dto;

interface DBInterface
{
    public function getUserByChatId(int $id): \stdClass;

    public function setUser(\stdClass $dto): bool;
}
