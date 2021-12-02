<?php

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->users;

$insertManyResult = $collection->insertMany([
    [
        'username' => 'admin',
        'email' => 'admin@example.com',
        'name' => 'Admin User',
    ],
    [
        'username' => 'test',
        'email' => 'test@example.com',
        'name' => 'Test User',
    ],
]);

printf("Inserted %d document(s)\n", $insertManyResult->getInsertedCount());

var_dump($insertManyResult->getInsertedIds());