<?php 

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->zips;

$cursor = $collection->find(['city' => 'JERSEY CITY', 'state' => 'NJ']);

foreach ($cursor as $document) {
    echo $document['_id'], "\n";
}
