<?php

declare(strict_types=1);

namespace Src\Repository;

use Src\Dto;
use Src\Interfaces\DBInterface;

class PDORepository implements DBInterface
{

    private static $connection;

    public static function conn(): \PDO
    {
        if(is_object(self::$connection))  return self::$connection;
        try{
            self::$connection = new \PDO('mysql:dbname='.NAME_BD.';host='.HOST.'', USER,
                PASSWORD, [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

            self::$connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            self::$connection ->exec("SET time_zone = 'Europe/Kiev'");
            self::$connection ->exec("SET sql_mode = ''");

            return self::$connection;
        } catch(\PDOException $e) {die("Database Connection error:".$e->getMessage());}
    }

    public function getUserByChatId(int $id): \stdClass
    {
        try {
            $sql = "SELECT `chat_id`, `first_name`, `last_name` FROM `users` WHERE `chat_id`= ?";
            $stmt = self::conn()->prepare($sql);
            $stmt->bindValue(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch();

            return $user;
        } catch(\PDOException $e) { die("Error:".$e->getMessage());}
    }

    public function setUser(Dto $dto): bool
    {
        if(self::getUserByChatId($dto->chatId)) return true;

        $sql = "INSERT INTO `users` (`chat_id`, `first_name`, `last_name`) VALUES (?, ?, ?)";
        $stmt = self::conn()->prepare($sql);
        $stmt->bindValue(1, $dto->chatId, \PDO::PARAM_INT);
        $stmt->bindValue(2, $dto->firstName, \PDO::PARAM_STR);
        $stmt->bindValue(3, $dto->lastName, \PDO::PARAM_STR);

        if (!$stmt->execute()) return false;

        return true;
    }
}
