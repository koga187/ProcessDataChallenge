<?php

namespace MongoImport\Entity;

class Order
{
    private $id;

    private $clientId;

    private $customerId;

    private $cartId;

    /**
     * @var MongoImport\Entity\Order\Details $details
     */
    private $details;

    /**
     * @var MongoImport\Entity\Order\Info $info
     */
    private $info;

    private $anonymous;

    private $updatedAt;

    private $createdAt;
}
