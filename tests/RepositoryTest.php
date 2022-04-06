<?php

namespace Tests;

use Src\Dto;
use Src\Models\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager as Capsule;

class RepositoryTest extends TestCase
{
    protected function setUp(): void
    {
//        try{
//        $this->connection = new \PDO('mysql:dbname='.$_ENV['TEST_NAME_DB'].';host='.$_ENV['TEST_HOST'].'', $_ENV['TEST_USER'],
//            $_ENV['TEST_PASSWORD'], [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
//
//        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
//        $this->connection ->exec("SET time_zone = 'Europe/Kiev'");
//        $this->connection ->exec("SET sql_mode = ''");
//        } catch(\PDOException $e) {die("Database Connection error:".$e->getMessage());}

        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'test_telegram',
            'username' => 'developer',
            'password' => 'semen'
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();


        $this->dto = new Dto(
            '/start',
            111,
            'testFirstName',
            'testLastName'
        );


        parent::setUp();
    }

    /**
     * @covers \Src\Repository\UserRepository::createUser
     */
    public function testCreateUser(): void
    {
        $user = User::create(
            [
                'chat_id' => $this->dto->chatId,
                'first_name' => $this->dto->firstName,
                'last_name' => $this->dto->lastName
            ]
        );

        $this->assertInstanceOf(User::class, $user);
    }

}
