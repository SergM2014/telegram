<?php

namespace Src\Actions;

interface ActionsInterface
{
    public function handle(object $connectionService, array $update): void;
}