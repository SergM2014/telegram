<?php

namespace Src;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyException extends \Exception
{
    protected $title;

    public function __construct($title, $message, $code = 0, Exception $previous = null) {
        $this->title = $title;
        parent::__construct($message, $code, $previous);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function log()
    {
        $logger = new Logger('my_logger');
        $logger->pushHandler(new StreamHandler(DATA_LOGS, Logger::DEBUG));
        $logger->info($this->getTitle()."<br />".$this->getMessage()."<br />");
    }
}