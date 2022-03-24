<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use Monolog\Logger;
use Src\Models\User;
use Src\MyException;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Src\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserRepository implements UserRepositoryInterface
{
//    public function __construct(
//       public Logger $logger
//    )
//    {}

    public function getUserByChatId(int $id): User
    {
//        try {
//            $user = User::where('chat_id', $id)->firstOrFail();
//        }
//           // throw new MyException('myException', 'my error message');
//        catch(ModelNotFoundException $ex){
//           // print_r($ex->getMessage());
//            $logger = new Logger('my_logger');
//            $logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
//            $logger->info($ex->getMessage());
//        }
 //       $this->logger->info('bum-bum-bum');
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