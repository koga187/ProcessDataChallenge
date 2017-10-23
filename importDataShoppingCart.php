<?php
require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\WriteConcern;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Driver\Query;
use MongoDB\BSON\ObjectId;

$dataInicial = new DateTime('now');

echo "Iniciado em " . $dataInicial->format("d/m/Y H:i:s") . PHP_EOL;
echo "Gerando dados..." . PHP_EOL;

$mongoManager = new Manager("mongodb://localhost:27017");


//Buscando produtos na base.
$filter = ["_id" => new ObjectId("59ee164a1d41c8abb87fd7c5")];
$queryProducts = new Query($filter, ["$projection", ["_id" => 1, "price" => 1]]);
$products = $mongoManager->executeQuery('shopback.products', $queryProducts);
print_r($products);
foreach ($products as $produt) {
    print_r($products);
}

exit("fim");
//Buscando users na base.
$queryUsers = new Query($filter, $options);

//Setando o journaling para false neste write concern
$writeConcern = new WriteConcern(1, 0, false);
$bulkShoppingCart = new BulkWrite();

for ($i = 0; $i <= 3000000 ; $i++) {

    if ($i != 0 && $i % 100000 == 0) {
        $dateInterval = $dataInicial->diff((new DateTime('now')));
        echo "Gerado " . $i . " - Tempo corrido - " . $dateInterval->i . " minutos " . $dateInterval->s . " segundos" . PHP_EOL;

        
        echo "Inserindo dados - " . PHP_EOL;

        $result = $mongoManager->executeBulkWrite('shopback.shoppingCart', $bulkShoppingCart, $writeConcern);

        $bulkShoppingCart = new BulkWrite();

        echo "Quantidade inserida - " . $result->getInsertedCount() . PHP_EOL;
    }

    
    $bulkShoppingCart->insert([
        "client_id" => "56d48438d2c39468a21494a4",
        "customer_id" => "???",
        "products" => [
                "0" => [
                        "product_id" => "584c477ccd2f5b78d554dfbb",
                        "price" => 269.9,
                        "quantity" => 1
                    ],

                "1" => [
                        "product_id" => "584c477ccd2f5b78d554dfb1",
                        "price" => 268.9,
                        "quantity" => 3
                    ]

            ],

        "amount" => 269.9,
        "info" => [
                "utm_source" => "",
                "utm_medium" => "",
                "utm_campaign" => "",
                "utm_term" => "",
                "utm_content" => ""
            ],

        "anonymous" => "",
        "complete" => "",
        "recovered" => "",
        "updated_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-05-26 18:24:21.000")),
        "created_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-05-26 18:23:41.000"))
        ]);
}