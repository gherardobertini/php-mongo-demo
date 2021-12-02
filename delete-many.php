<?php

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->users;
$collection->drop();

$collection->insertOne(['name' => 'Bob', 'state' => 'ny']);
$collection->insertOne(['name' => 'Alice', 'state' => 'ny']);
$deleteResult = $collection->deleteMany(['state' => 'ny']);

printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());