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
$bulkProducts = new BulkWrite();
//Setando o journaling para false neste write concern
$writeConcern = new WriteConcern(1, 0, false);

for ($i = 0; $i <= 3000000 ; $i++) {

    if ($i != 0 && $i % 100000 == 0) {
        $dateInterval = $dataInicial->diff((new DateTime('now')));
        echo "Gerado " . $i . " - Tempo corrido - " . $dateInterval->i . " minutos " . $dateInterval->s . " segundos" . PHP_EOL;

        
        echo "Inserindo dados - " . PHP_EOL;

        $result = $mongoManager->executeBulkWrite('shopback.products', $bulkProducts, $writeConcern);

        $bulkProducts = new BulkWrite();

        echo "Quantidade inserida - " . $result->getInsertedCount() . PHP_EOL;
    }

    
    $bulkProducts->insert([
        "client_id" => "56d48438d2c394657c2adb7b",
        "title" => "Ionto Vita Slim",
        "description" => "Eletrocosmético para tratamento de gordura localizada, principalmente masculina e de mulheres acima de 40 anos, e celulite, devido a sua altíssima concentração de ativos (34,5% de ativos) e sinergia com o ativo especializado Pheoslim. Indicado como auxiliar em procedimentos estéticos. Sua formulação contém algas e extratos vegetais, que são ricos em flavonoides, oligoelementos, saponinas, nucleoproteínas, lecitina, mucina. Potencializa os resultados se usado como base em aplicação de faixa gessada, pelo seu efeito oclusivo, ou após a aplicação de máscaras de argila, termoterapia ou crioterapia. Ótimo para ser associado à vinhoterapia e destoxi-redução.",
        "categories" => [
                "0" => "Cosméticos",
                "1" => "Cosméticos Profissionais",
                "2" => "Líquidos",
                "3" => "Gordura Localizada",
            ],
        "subcategories" => [
                "0" => "Ionto",
                "1" => "Vita",
                "2" => "Slim",
                "3" => "Buona",
            ],
        "price" => 152.37,
        "normal_price" => 169.3,
        "active" => 1,
        "updated_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-05-26 06:40:32.000")),
        "created_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2016-12-10 18:20:02.000")),
        "synced" => 1,
        ]);
}