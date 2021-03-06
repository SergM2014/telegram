<?php

declare(strict_types=1);

namespace Src\Interfaces;

use Src\Dto;
use Src\Models\User;

interface UserRepositoryInterface
{
    public function getUserByChatId(Dto $dto): ?User;

    public function createUser(Dto $dto): ?User;
}