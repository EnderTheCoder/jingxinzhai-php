<?php

class ReturnValue {


    public ReturnType $SUCCESS;
    public ReturnType $MISSING_FIELDS;
    public ReturnType $DB_ERROR;

    public array $data;

    public function __construct() {
        $this->init();
    }

    private function setReturnValue($code, $message): ReturnType {
        return new ReturnType($code, $message);
    }

    private function init(): void {
        $this->SUCCESS = $this->setReturnValue(100, "request success");
        $this->MISSING_FIELDS = $this->setReturnValue(201, "missing field from request");
        $this->DB_ERROR = $this->setReturnValue(202, "something bad happened to our database, contact admin to fix");
    }

    public function setData($data): self {
        $this->data = $data;
        return $this;
    }

    public function addData($key, $value): self {
        $this->data[$key] = $value;
        return $this;
    }

    public function launch(): void{
        echo json_encode($this->data);
    }

}