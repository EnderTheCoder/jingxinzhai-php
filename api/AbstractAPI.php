<?php

abstract class AbstractAPI
{

    private ReturnValue $returnValue;

    private array $fields;

    public function __construct($fields) {
        $this->fields = $fields;
    }

    public function fieldsCheck(): bool {
        return true;
    }

    public function run() {

    }

    public function getReturnValue() {

    }

}