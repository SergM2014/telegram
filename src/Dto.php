<?php

namespace Src;

class Dto
{
    public string $text;
    public int $chatId;
    public string $firstName;
    public string $lastName;

    public function __construct($input)
    {
        $update = file_get_contents($input);
        $update = json_decode($update, true);

        $this->text = $update['message']['text'];
        $this->chatId = $update['message']['chat']['id'];
        $this->firstName = $update['message']['chat']['first_name'];
        $this->lastName = $update['message']['chat']['last_name'];
    }

    public function getObject(): self
    {
        return $this;
    }

}
