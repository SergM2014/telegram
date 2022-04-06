<?php

namespace Src;

class Database
{
    private  $connection;

//    public  function conn(): \PDO
    public function __constructor()
    {
        if(is_object($this->connection))  return $this->connection;
        try{
            $this->connection = new \PDO('mysql:dbname='.$_ENV['NAME_DB'].';host='.$_ENV['HOST'].'', $_ENV['USER'],
                $_ENV['PASSWORD'], [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->connection ->exec("SET time_zone = 'Europe/Kiev'");
            $this->connection ->exec("SET sql_mode = ''");

            //return $this->connection;
        } catch(\PDOException $e) {die("Database Connection error:".$e->getMessage());}
    }

    public function getConnection()
    {
        return $this->connection;
    }

//    public static function getUserByChatId(int $id): stdClass|bool
//    {
//        try {
//            $sql = "SELECT `chat_id`, `first_name`, `last_name` FROM `users` WHERE `chat_id`= ?";
//            $stmt = self::conn()->prepare($sql);
//            $stmt->bindValue(1, $id, PDO::PARAM_INT);
//            $stmt->execute();
//            $user = $stmt->fetch();
//
//            return $user;
//        } catch(PDOException $e) { die("Error:".$e->getMessage());}
//    }
//
//    public static function setUser(array $update): bool
//    {
//        if(self::getUserByChatId($update['message']['chat']['id'])) return true;
//
//        $sql = "INSERT INTO `users` (`chat_id`, `first_name`, `last_name`) VALUES (?, ?, ?)";
//        $stmt = self::conn()->prepare($sql);
//        $stmt->bindValue(1, $update['message']['chat']['id'], PDO::PARAM_INT);
//        $stmt->bindValue(2, $update['message']['chat']['first_name'], PDO::PARAM_STR);
//        $stmt->bindValue(3, $update['message']['chat']['last_name'], PDO::PARAM_STR);
//
//        if (!$stmt->execute()) return false;
//
//        return true;
//    }
}