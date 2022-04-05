<?php

namespace Tests;

use Src\Dto;
use Monolog\Logger;
use Src\Actions\Me;
use Src\Models\User;
use Src\Actions\Save;
use Src\Actions\Start;
use DG\BypassFinals;
use Src\Actions\NotFound;
use Src\Actions\ErrorOutput;
use PHPUnit\Framework\TestCase;
use Src\Repository\UserRepository;
use SimpleTelegramBot\Connection\CurlConnectionService;

class ActionsTest extends TestCase
{
    protected function setUp(): void {
        BypassFinals::enable();

        $this->dto = new Dto(
            '/start',
            111,
            'Serhii',
            'Me'
        );

        $this->checkBasicApiUrl();

        $this->connectionService = $this->getMockBuilder(CurlConnectionService::class)
            ->onlyMethods(['withArrayResponse'])
            ->getMock();

        $this->connectionService->expects($this->once())
            ->method('withArrayResponse');

        $this->logger = $this->createMock(Logger::class);
        $this->errorOutput = $this->createMock(ErrorOutput::class);

        $this->userRepository = $this->getMockBuilder(UserRepository::class)
            ->onlyMethods(['createUser', 'getUserByChatId'])
            ->setConstructorArgs([$this->logger, $this->errorOutput])
            ->getMock();

        parent::setUp();
    }

    private function checkBasicApiUrl(): void
    {
      if(defined('BASIC_API_URL')) define('BASIC_API_URL', 'https://api.telegram.org/bot1edhrto;drthg;l/');
    }

    public function testStart(): void
    {
       $start = new Start($this->connectionService);
       $start($this->dto);
    }

    public function testSave(): void
    {
        $this->userRepository ->expects($this->once())
            ->method('createUser')
            ->with($this->dto);

        $save = new Save($this->connectionService,$this->userRepository);
        $save($this->dto);
    }

    public function testMe(): void
    {
        $this->userRepository ->expects($this->once())
            ->method('getUserByChatId')
            ->with($this->dto);

        $me = new Me($this->connectionService,$this->userRepository);
        $me($this->dto);
    }

    public function testNotFound(): void
    {
        $start = new NotFound($this->connectionService);
        $start($this->dto);
    }

    public function testErrorOutput(): void
    {
        $start = new ErrorOutput($this->connectionService);
        $start($this->dto);
    }
}