<?php

namespace Src\Interfaces;

interface ActionsInterface
{
    public function handle(array $update): void;
}