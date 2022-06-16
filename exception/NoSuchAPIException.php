<?php

class NoSuchAPIException extends Exception
{

    public function __construct(string $api, ?Throwable $previous = null)
    {
        $message = "The api you requested(" . $api . ") does not exist";
        $code = 202;
        parent::__construct($message, $code, $previous);
    }
}