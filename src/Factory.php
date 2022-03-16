<?php

namespace Src;

use Src\Actions\Me;
use Src\Actions\Save;
use Src\Actions\Start;
use Src\Actions\NotFound;
use Src\Interfaces\ActionsInterface;

class Factory
{
    public static function create(string $flag): ActionsInterface
    {
       return match ($flag) {
            '/me' => new Me(),
            '/save' => new Save(),
            '/start' => new Start(),
            default => new NotFound(),
        };
    }
}