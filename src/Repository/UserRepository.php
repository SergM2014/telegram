<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use Src\Models\User;
use Src\ErrorHandling;
use Src\Interfaces\UserRepositoryInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    use ErrorHandling;

    public function __construct(
        private CurlConnectionService $connectionService,
    )
    {}

    public function getUserByChatId(Dto $dto): User
    {
        try {
            $user = User::where('chat_id', $dto->chatId)->firstOrFail();
        }
        catch(ModelNotFoundException $ex){
            $this->processError($ex->getMessage(), $dto);
        }

        return $user;
    }

    public function createUser(Dto $dto): User
    {
        $user = User::where('chat_id', $dto->chatId)->first();
        if ($user) return $user;

        try {
            $user = User::create([
                'chat_id' => $dto->chatId,
                'first_name' => $dto->firstName,
                'last_name' => $dto->lastName
            ]);
        } catch (\PDOException $ex) {
            $this->processError($ex->getMessage(), $dto);
        }

       return $user;
    }
}