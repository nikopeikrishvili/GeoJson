<?php

use GeoJSON\GeoJSON;

require_once __DIR__ . '/../vendor/autoload.php';

$data = [
    'type' => 'Feature',
    'properties' => [],
    'geometry' => [
        'coordinates' => [
            [
                [100.0, 0.0],
                [101.0, 1.0]
            ],
            [
                [100.0, 0.0],
                [101.0, 1.0]
            ]
        ],
        'type' => 'MultiLineString'
    ]
];
$geoJson = new GeoJSON($data);
// or
// $geojson = new GeoJson('some_geojson_file.json');

echo $geoJson->getType()->value.PHP_EOL; // FeatureCollection
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getType()->value.PHP_EOL; // Feature
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType()->value.PHP_EOL; // MultiLineString
print_r($geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
//Array
//(
//    [0] => Array
//        (
//            [0] => Array
//                (
//                    [0] => 100
//                    [1] => 0
//                )
//
//            [1] => Array
//                (
//                    [0] => 101
//                    [1] => 1
//                )
//
//        )
//
//    [1] => Array
//        (
//            [0] => Array
//                (
//                    [0] => 100
//                    [1] => 0
//                )
//
//            [1] => Array
//                (
//                    [0] => 101
//                    [1] => 1
//                )
//
//        )
//
//)



