<?php

class ReturnType
{
    private int $code;
    private string $message;

    public function __construct($code, $message) {
        $this->code = $code;
        $this->message = $message;
    }

    public function getCode(): int {
        return $this->code;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(String $message): self {
        $this->message = $message;
        return $this;
    }

}