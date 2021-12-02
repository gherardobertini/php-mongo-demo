<?php 

/**
 * The following example uses the limit and sort options to query for the five most populous zip codes in the United States:
 */

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->zips;

$cursor = $collection->find(
    [],
    [
        'limit' => 5,
        'sort' => ['pop' => -1],
    ]
);

foreach ($cursor as $document) {
    printf("%s: %s, %s\n", $document['_id'], $document['city'], $document['state']);
}