<?php 

require __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']))->test->restaurants;

$cursor = $collection->find(
    [
        'cuisine' => 'Italian',
        'borough' => 'Manhattan',
    ],
    [
        'projection' => [
            'name' => 1,
            'borough' => 1,
            'cuisine' => 1,
        ],
        'limit' => 4,
    ]
);

foreach($cursor as $restaurant) {
   var_dump($restaurant);
};
