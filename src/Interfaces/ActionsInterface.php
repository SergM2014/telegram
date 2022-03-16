<?php

namespace Src\Interfaces;

interface ActionsInterface
{
    public function handle(object $connectionService, array $update): void;
}