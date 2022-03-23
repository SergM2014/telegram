<?php

namespace Src\Entity;

class User
{
    private int $chadId;

    private string $firstName;

    private string $lastName;

    public function setChatId(int $chatId)
    {
        $this->chadId = $chatId;
    }

    public function getChatId()
    {
        return $this->chadId;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}