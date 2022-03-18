<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;

interface DBInterface
{
    public function getUserByChatId(int $id): \stdClass;

    public function setUser(Dto $dto): bool;
}
