<?php

require __DIR__ . "/vendor/autoload.php";

$filename = 'https://media.mongodb.org/zips.json';
$lines = file($filename, FILE_IGNORE_NEW_LINES);

$bulk = new MongoDB\Driver\BulkWrite;

foreach ($lines as $line) {
    $bson = MongoDB\BSON\fromJSON($line);
    $document = MongoDB\BSON\toPHP($bson);
    $bulk->insert($document);
}

$manager = new MongoDB\Driver\Manager($_ENV['ME_CONFIG_MONGODB_URL']);

$result = $manager->executeBulkWrite('test.zips', $bulk);
printf("Inserted %d documents\n", $result->getInsertedCount());