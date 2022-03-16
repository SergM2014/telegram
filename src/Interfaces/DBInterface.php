<?php

namespace Src\Interfaces;

interface DBInterface
{
    public function getUserByChatId(int $id): \stdClass|bool;

    public function setUser(array $update): bool;
}
