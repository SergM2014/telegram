<?php

namespace Src\Services;

class Dto
{
    public static function getObject($input): \stdClass
    {
        $update = file_get_contents($input);
        $update = json_decode($update, true);

        $dto = new \stdClass();
        $dto->text = $update['message']['text'];
        $dto->chatId = $update['message']['chat']['id'];
        $dto->firstName = $update['message']['chat']['first_name'];
        $dto->lastName = $update['message']['chat']['last_name'];

        return $dto;
    }
}
