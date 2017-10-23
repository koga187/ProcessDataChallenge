<?php
require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\WriteConcern;
use MongoDB\BSON\UTCDateTime;

$productData = [];
$dataInicial = new DateTime('now');

echo "Iniciado em " . $dataInicial->format("d/m/Y H:i:s") . PHP_EOL;
echo "Gerando dados..." . PHP_EOL;

$mongoManager = new Manager("mongodb://localhost:27017");
$bulkUsers = new BulkWrite();
//Setando o journaling para false neste write concern
$writeConcern = new WriteConcern(1, 0, false);

for ($i = 0; $i <= 3000000 ; $i++) {

    if ($i != 0 && $i % 100000 == 0) {
        $dateInterval = $dataInicial->diff((new DateTime('now')));
        echo "Gerado " . $i . " - Tempo corrido - " . $dateInterval->i . " minutos " . $dateInterval->s . " segundos" . PHP_EOL;

        
        echo "Inserindo dados - " . PHP_EOL;

        $result = $mongoManager->executeBulkWrite('shopback.users', $bulkUsers, $writeConcern);

        $bulkUsers = new BulkWrite();

        echo "Quantidade inserida - " . $result->getInsertedCount() . PHP_EOL;
    }

    
    $bulkUsers->insert([
        "customer_id" => "58d549d3808c3c0b89263d51",
        "email" => "joselito@aol.com",
        "details" => [
            "first_name" => "joselito",
            "last_name" => "mesquita",
            "full_name" => "",
            "birthdate" => "",
            "age_group" => "",
            "telephone" => "9999123456",
            "identification" => [
                    0 => [
                            "type" => "cpf",
                            "typeName" => "CPF",
                            "number" => "0000001010",
                        ]

                ]
            ],

        "address" => [
                0 => [
                        "address" => "",
                        "number" => "",
                        "address_complement" => "",
                        "city" => "Bacabal",
                        "state" => "MA",
                        "country" => "Brasil",
                        "zipcode" => "65700000",
                        "is_primary" => "1",
                    ]
            ],

        "updated_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-04-01 00:55:25.000")),
        "created_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-03-31 21:24:46.000"))
        ]);
}