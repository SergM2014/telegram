<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use Src\Models\User;
use Src\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUserByChatId(int $id): User
    {
        return User::where('chat_id', $id)->firstOrFail();
    }

    public function createUser(Dto $dto): User
    {
        $user =  User::where('chat_id', $dto->chatId)->first();
        if ($user) return $user;

       $user = User::create([
            'chat_id' => $dto->chatId,
            'first_name' => $dto->firstName,
            'last_name' => $dto->lastName
        ]);

       return $user;
    }
}