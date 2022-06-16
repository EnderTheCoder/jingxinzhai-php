<?php


class MissingFieldException extends Exception
{


    public function __construct(string $missingField, ?Throwable $previous = null)
    {
        $message = "Missing essential field (".$missingField.").";
        $code = 201;
        parent::__construct($message, $code, $previous);
    }
}