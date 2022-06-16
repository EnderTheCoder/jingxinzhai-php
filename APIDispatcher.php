<?php

class APIDispatcher
{


    private array $fields;
    private AbstractAPI $api;


    public function __construct()
    {
        $return = new ReturnValue();

        try {
            $this->fields = $_GET;
            $this->api = $this->getAPI($this->fields['api']);
            $this->api->fieldsCheck();
        } catch (PDOException $e) {
            $return->setType($return->DB_ERROR);
        } catch (MissingFieldException $e) {
            $return->setType($return->MISSING_FIELDS);
        } catch (NoSuchAPIException $e) {
            $return->setType($return->NO_SUCH_API);
        }

        $return->launch();
    }

    public function getAPI($name): AbstractAPI
    {

        $api = null;

        switch ($name) {
            case "get_price":
            {
                $api = new GetPriceAPI($this->fields);
                break;
            }
            default:
            {
                throw new NoSuchAPIException($name);
            }

        }

        return $api;
    }

    public function run(): self
    {

        return $this;
    }

}