<?php

namespace Src\Interfaces;

interface DBInterface
{
    public function getUserByChatId(int $id): \stdClass;

    public function setUser(\stdClass $dto): bool;
}
