<?php

use GeoJSON\GeoJSON;

require_once __DIR__ . '/../vendor/autoload.php';

$data = [
    'type' => 'Feature',
    'properties' => [],
    'geometry' => [
        'coordinates' => [-20.01426515213, 34.502219028323],
        'type' => 'Point'
    ]
];
$geoJson = new GeoJSON($data);
// or
// $geojson = new GeoJson('some_geojson_file.json');

echo $geoJson->getType()->value.PHP_EOL; // FeatureCollection
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getType()->value.PHP_EOL; // Feature
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType()->value.PHP_EOL; // Point
print_r($geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
//Array
//(
//    [0] => -20.01426515213
//    [1] => 34.502219028323
//)

