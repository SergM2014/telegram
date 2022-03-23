<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use Src\Models\User;
use Src\MyException;
use Src\Interfaces\UserRepositoryInterface;


class UserRepository implements UserRepositoryInterface
{
    public function getUserByChatId(int $id): User
    {
        try {
            return User::where('chat_id', $id)->first();
            throw new MyException('myException', 'my error message');
        } catch (MyException $e) {
            $e->log();
        }

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