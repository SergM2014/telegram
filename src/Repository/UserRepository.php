<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use DI\Container;
use Monolog\Logger;
use Src\Models\User;
use Src\Actions\ErrorOutput;
use Monolog\Handler\StreamHandler;
use Src\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    private Logger $logger;

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

    private function printLog(string $messageToLog): void
    {
        $this->logger = new Logger('my_logger');
        $this->logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
        $this->logger->debug($messageToLog);
    }

    public function handleError(string $messageToLog, Dto $dto): void
    {
        $this->printLog($messageToLog);
        $myClass = (new Container())->get(ErrorOutput::class);
        $myClass($dto);
        exit();
    }
}