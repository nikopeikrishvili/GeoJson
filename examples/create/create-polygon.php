<?php

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\Polygon;

require_once __DIR__.'/../../vendor/autoload.php';

$polygon = new Polygon([
    [
        [
            -72.04315136683675,
            29.451187895050822
        ],
        [
            -72.04315136683675,
            27.849712263460177
        ],
        [
            -68.23275413868745,
            27.849712263460177
        ],
        [
            -68.23275413868745,
            29.451187895050822
        ],
        [
            -72.04315136683675,
            29.451187895050822
        ]
    ]
]);
try {
    $geoJson = $polygon->asGeoJson();
    $geoJsonString = $geoJson->asString(); // will return GeoJson String
    echo $geoJsonString.PHP_EOL;
} catch (GeoJSONTypeIsNotDefined|InvalidGeoJSONInputException|InvalidGeoJSONTypeException $e) {
} // will return GeoJson Object


