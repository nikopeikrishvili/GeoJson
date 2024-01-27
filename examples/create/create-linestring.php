<?php

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\LineString;

require_once __DIR__.'/../../vendor/autoload.php';


try {
    $linestring = new LineString([
        [
            -69.7347514408108,
            31.162478414516926
        ],
        [
            -68.73265178050848,
            32.632923495493614
        ],
        [
            -66.5543266232896,
            33.128544043762716
        ]
    ]);
    $linestring->setProperties(['name' => 'City']);
    $geoJson = $linestring->asGeoJson();
    $geoJsonString = $geoJson->asString(); // will return GeoJson String
    echo $geoJsonString.PHP_EOL;
} catch (GeoJSONTypeIsNotDefined|InvalidGeoJSONInputException|InvalidGeoJSONTypeException $e) {
} // will return GeoJson Object


