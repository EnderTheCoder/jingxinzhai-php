<?php

class ReturnValue
{


    public ReturnType $SUCCESS;
    public ReturnType $MISSING_FIELDS;
    public ReturnType $DB_ERROR;
    public ReturnType $NO_SUCH_API;

    public ReturnType $currentReturnType;
    public array $data;

    public function __construct()
    {
        $this->init();
    }

    private function setReturnValue($code, $message): ReturnType
    {
        return new ReturnType($code, $message);
    }

    private function init(): void
    {
        $this->SUCCESS = $this->setReturnValue(100, "request success");
        $this->MISSING_FIELDS = $this->setReturnValue(201, "missing field from request");
        $this->NO_SUCH_API = $this->setReturnValue(202, "the api you requested does not exist");
        $this->DB_ERROR = $this->setReturnValue(301, "something bad happened to our database, contact admin to fix");

    }

    public function setType(ReturnType $type): self
    {
        $this->currentReturnType = $type;
        return $this;
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function addData($key, $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->currentReturnType->setMessage($message);
        return $this;
    }

    public function launch(): void
    {
        $finalData = array();

        $finalData['data'] = $this->data;
        $finalData['code'] = $this->currentReturnType->getCode();
        $finalData['message'] = $this->currentReturnType->getMessage();

        echo json_encode($finalData);
    }

}