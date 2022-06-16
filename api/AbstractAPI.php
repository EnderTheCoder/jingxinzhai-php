<?php

abstract class AbstractAPI
{

    private ReturnValue $returnValue;

    private array $fields;

    private array $essentialFieldKeys = ["api"];

    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @throws MissingFieldException
     */
    public function fieldsCheck(): void
    {
        foreach ($this->essentialFieldKeys as $key) {
            if (!array_key_exists($key)) throw new MissingFieldException($key);
        }
    }

    public function run(): self
    {
        return $this;
    }

    public function getReturnValue(): self
    {
        return $this;
    }

}