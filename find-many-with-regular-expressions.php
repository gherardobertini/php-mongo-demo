<?php 

/**
 * The following example lists documents in the zips collection where the city name starts with “garden” and the state is Texas:
 */

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->zips;

$cursor = $collection->find([
    'city' => new MongoDB\BSON\Regex('^garden', 'i'),
    'state' => 'TX',
]);

foreach ($cursor as $document) {
   printf("%s: %s, %s\n", $document['_id'], $document['city'], $document['state']);
}