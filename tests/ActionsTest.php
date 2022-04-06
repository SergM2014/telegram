<?php

namespace Tests;

use Src\Dto;
use Monolog\Logger;
use Src\Actions\Me;
use DG\BypassFinals;
use Src\Actions\Save;
use Src\Actions\Start;
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

    /**
     * @covers \Src\Actions\Start::_invoke
     */
    public function testStart(): void
    {
       $start = new Start($this->connectionService);
       $start($this->dto);
    }

    /**
     * @covers \Src\Actions\Save::__invoke
     */
    public function testSave(): void
    {
        $this->userRepository ->expects($this->once())
            ->method('createUser')
            ->with($this->dto);

        $save = new Save($this->connectionService,$this->userRepository);
        $save($this->dto);
    }

    /**
     * @covers \Src\Actions\Me::__invoke
     */
    public function testMe(): void
    {
        $this->userRepository ->expects($this->once())
            ->method('getUserByChatId')
            ->with($this->dto);

        $me = new Me($this->connectionService,$this->userRepository);
        $me($this->dto);
    }

    /**
     * @covers \Src\Actions\NotFound::__invoke
     */
    public function testNotFound(): void
    {
        $start = new NotFound($this->connectionService);
        $start($this->dto);
    }

    /**
     * @covers \Src\Actions\ErrorOutput::_invoke
     */
    public function testErrorOutput(): void
    {
        $start = new ErrorOutput($this->connectionService);
        $start($this->dto);
    }
}