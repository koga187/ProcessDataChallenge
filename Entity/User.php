<?php

namespace MongoImport\Entity;

class User
{
    private $id;

    private $customer_id;

    private $email;

    /**
     * @var Details $details
     */
    private $details;

    /**
     * @var Address $address
     */
    private $address;

    private $updateAt;

    private $createdAt;
}
