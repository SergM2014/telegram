<?php

declare(strict_types=1);

namespace Src;

class Dto
{
    public function __construct(
         public readonly string $text,
         public readonly int $chatId,
         public readonly string $firstName,
         public readonly string $lastName
    )
    {}

}
