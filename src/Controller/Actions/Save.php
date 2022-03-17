<?php

namespace Src\Controller\Actions;

use Src\Services\Dto;
use Src\Repository\PDORepository;
use Src\Controller\MainController;
use Src\Interfaces\ActionsInterface;

class Save extends MainController implements ActionsInterface
{
    public function handle(\stdClass $dto): void
    {
        (new PDORepository())->setUser($dto);
        $this->connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $dto->chatId . '&text=Saved!'
        );
    }
}