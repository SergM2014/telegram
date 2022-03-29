<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use DI\Container;
use Monolog\Logger;
use Src\Models\User;
use Src\Actions\ErrorOutput;
use Src\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
      public  Logger $logger
    )
    { }

    public function getUserByChatId(Dto $dto): User
    {
        try {
            $user = User::where('chat_id', $dto->chatId)->firstOrFail();
        }
        catch(ModelNotFoundException $ex){
            $this->handleError($ex->getMessage(), $dto);
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
            $this->handleError($ex->getMessage(), $dto);
        }

       return $user;
    }

    private function handleError(string $messageToLog, Dto $dto): void
    {
        $this->logger->info($messageToLog);

        $myClass = (new Container())->get(ErrorOutput::class);
        $myClass($dto);
        exit();
    }
}