<?php

class APIDispatcher {



    private array $fields;

    public function __construct() {

        $this->fields = $_GET;
    }

    public function getAPI($name) {

        $api = null;

        switch ($name) {
            case "get_price": {
                $api = new GetPriceAPI();
                break;
            }
        }
    }

}