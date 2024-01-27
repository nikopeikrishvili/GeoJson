<?php

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\LineString;
use GeoJSON\FeatureTypes\MultiLineString;

require_once __DIR__.'/../../vendor/autoload.php';


try {
    $multiLinestring = new MultiLineString([
        [
            [
                -68.5513197727071,
                33.99521095890789
            ],
            [
                -67.78653620416506,
                35.99451263925742
            ]
        ],
        [
            [
                -69.53443935452637,
                33.108664189620654
            ],
            [
                -66.71821468545821,
                33.88049247462571
            ],
            [
                -66.04626607277956,
                32.59053285577045
            ]
        ]
    ]);
    $multiLinestring->setProperties(['name' => 'City']);
    $geoJson = $multiLinestring->asGeoJson();
    $geoJsonString = $geoJson->asString(); // will return GeoJson String
    echo $geoJsonString.PHP_EOL;
} catch (GeoJSONTypeIsNotDefined|InvalidGeoJSONInputException|InvalidGeoJSONTypeException $e) {
} // will return GeoJson Object


