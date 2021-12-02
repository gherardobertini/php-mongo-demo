<?php 

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->zips;

$document = $collection->findOne(['_id' => '94301']);

var_dump($document);
