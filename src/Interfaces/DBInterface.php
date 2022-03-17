<?php

namespace Src\Interfaces;

use Src\Services\Dto;

interface DBInterface
{
    public function getUserByChatId(int $id): \stdClass|bool;

    public function setUser(Dto $dto): bool;
}
