<?php

declare(strict_types=1);

namespace Src\Actions;

use Src\Dto;
use Src\ContainerTrait;
use Src\Repository\UserRepository;
use Src\Interfaces\ActionsInterface;
use SimpleTelegramBot\Connection\CurlConnectionService;

class Save implements ActionsInterface
{
    use ContainerTrait;

    public function __construct(
        private CurlConnectionService $connectionService,
        private UserRepository $userRepository
    )
    {}

    public function __invoke(Dto $dto): void
    {
        $class = $this->buildContainer()->get($this->userRepository::class);
        $class->createUser($dto);

        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}
