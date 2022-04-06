<?php

namespace Tests;

use Src\Dto;
use Monolog\Logger;
use Src\Models\User;
use Src\Actions\ErrorOutput;
use PHPUnit\Framework\TestCase;
use Src\Repository\UserRepository;
use Illuminate\Database\Capsule\Manager as Capsule;

class RepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => $_ENV['TEST_DRIVER'],
            'host' => $_ENV['TEST_HOST'],
            'database' => $_ENV['TEST_DATA_BASE'],
            'username' => $_ENV['TEST_USER'],
            'password' => $_ENV['TEST_PASSWORD']
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        User::whereNotNull('id')->delete();

        $this->dto = new Dto(
            '/start',
            111,
            'testFirstName',
            'testLastName'
        );

        $this->logger = $this->createMock(Logger::class);
        $this->errorOutput = $this->createMock(ErrorOutput::class);

        parent::setUp();
    }

    /**
     * @covers \Src\Repository\UserRepository::createUser
     */
    public function testCreateUser(): void
    {
        $user = (new UserRepository($this->logger, $this->errorOutput))->createUser($this->dto);
        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @covers \Src\Repository\UserRepository::getUserByChatId
     */
    public function testGetUserByChatId(): void
    {
        (new UserRepository($this->logger, $this->errorOutput))->createUser($this->dto);
        $user = (new UserRepository($this->logger, $this->errorOutput))->getUserByChatId($this->dto);

        $this->assertInstanceOf(User::class, $user);
    }

}
