<?php

/**
 * https://docs.mongodb.com/php-library/current/tutorial/crud/
 * 
 * The following example inserts one document into an empty users collection in the test database, and then replaces that document with a new one:
 */
require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->users;
$collection->drop();

$collection->insertOne(['name' => 'Bob', 'state' => 'ny']);
$updateResult = $collection->replaceOne(
    ['name' => 'Bob'],
    ['name' => 'Robert', 'state' => 'ca']
);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());