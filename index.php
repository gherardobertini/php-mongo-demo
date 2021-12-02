<?php

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->examples->movies;
$result = $collection->find()->toArray();

echo json_encode($result);
?>
