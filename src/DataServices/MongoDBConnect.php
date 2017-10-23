<?php

namespace Shopback\DataServices;

use MongoDB\Driver\Manager;

class MongoDBConnect
{
    private $database = "shopback";

    abstract function getInstance() {
        return new Manager("mongodb://localhost:27017/shopback");
    }
}