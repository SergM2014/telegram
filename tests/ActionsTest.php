<?php

namespace Tests;

use Src\Dto;
use Src\Models\User;
use Src\Actions\Start;
use DG\BypassFinals;
use PHPUnit\Framework\TestCase;
use Src\Repository\UserRepository;
use SimpleTelegramBot\Connection\CurlConnectionService;

class ActionsTest extends TestCase
{
    private $dto;
    private $connectionService;
    private $userRepository;

    protected function setUp(): void {
        BypassFinals::enable();

        $this->dto = new Dto(
            '/start',
            111,
            'Serhii',
            'Me'
        );


        define('BASIC_API_URL', 'https://api.telegram.org/bot1edhrto;drthg;l/');
        parent::setUp();
    }

    public function testStart(): void
    {
        $connectionService = $this->getMockBuilder(CurlConnectionService::class)
             ->setMethods(['withArrayResponse'])
             ->getMock();

        $connectionService->expects($this->once())
            ->method('withArrayResponse');

       $start = new Start($connectionService);
       $start($this->dto);
    }
}