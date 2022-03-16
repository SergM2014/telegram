<?php

namespace Src\Interfaces;

interface ActionsInterface
{
    public function handle(object $dto): void;
}