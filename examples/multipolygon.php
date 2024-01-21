<?php

use GeoJSON\GeoJSON;

require_once __DIR__ . '/../vendor/autoload.php';

$data = [
    'type' => 'Feature',
    'properties' => [],
    'geometry' => [
        'coordinates' => [
            [
                [-20.01426515213, 34.502219028323],
                [-18.365650806102, 34.502219028323],
                [-18.365650806102, 35.548141481836],
                [-20.01426515213, 35.548141481836],
                [-20.01426515213, 34.502219028323]
            ],
            [
                [-20.01426515213, 34.502219028323],
                [-18.365650806102, 34.502219028323],
                [-18.365650806102, 35.548141481836],
                [-20.01426515213, 35.548141481836],
                [-20.01426515213, 34.502219028323]
            ]
        ],
        'type' => 'MultiPolygon'
    ]
];
$geoJson = new GeoJSON($data);
// or
// $geojson = new GeoJson('some_geojson_file.json');

echo $geoJson->getType()->value.PHP_EOL; // FeatureCollection
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getType()->value.PHP_EOL; // Feature
echo $geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType()->value.PHP_EOL; // MultiPolygon
print_r($geoJson->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
//Array
//(
//    [0] => Array
//    (
//        [0] => Array
//        (
//                      [0] => -20.01426515213
//                      [1] => 34.502219028323
//                )
//
//            [1] => Array
//(
//                    [0] => -18.365650806102
//                    [1] => 34.502219028323
//                )
//
//            [2] => Array
//(
//                    [0] => -18.365650806102
//                    [1] => 35.548141481836
//                )
//
//            [3] => Array
//              (
//                      [0] => -20.01426515213
//                      [1] => 35.548141481836
//                )
//
//            [4] => Array
//(
//                      [0] => -20.01426515213
//                      [1] => 34.502219028323
//                )
//
//        )
//
//    [1] => Array
//(
//    [0] => Array
//    (
//        [0] => -20.01426515213
//                    [1] => 34.502219028323
//                )
//
//            [1] => Array
//(
//                      [0] => -18.365650806102
//                      [1] => 34.502219028323
//                )
//
//            [2] => Array
//(
//                    [0] => -18.365650806102
//                    [1] => 35.548141481836
//                )
//
//            [3] => Array
//(
//                    [0] => -20.01426515213
//                    [1] => 35.548141481836
//                )
//
//            [4] => Array
//(
//                    [0] => -20.01426515213
//                    [1] => 34.502219028323
//                )
//
//        )
//
//)

