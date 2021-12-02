<?php

require __DIR__ . "/vendor/autoload.php";

$filename = 'data/movies.json';
$json = file_get_contents($filename);

$jsonDecoded = json_decode($json, true);
//var_dump($jsonDecoded);
$bulk = new MongoDB\Driver\BulkWrite;
foreach ($jsonDecoded as $arrayItem) {
    $bulk->insert($arrayItem);
}


/*
$lines = file($filename, FILE_IGNORE_NEW_LINES);
$bulk = new MongoDB\Driver\BulkWrite;

foreach ($lines as $line) {
    $bson = MongoDB\BSON\fromJSON($line);
    $document = MongoDB\BSON\toPHP($bson);
    $bulk->insert($document);
}
*/

$manager = new MongoDB\Driver\Manager($_ENV['ME_CONFIG_MONGODB_URL']);

$result = $manager->executeBulkWrite('examples.movies', $bulk);
printf("Inserted %d documents\n", $result->getInsertedCount());
