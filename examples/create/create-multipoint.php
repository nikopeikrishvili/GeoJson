<?php

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidFeatureTypeException;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\MultiPoint;

require_once __DIR__.'/../../vendor/autoload.php';

try {
    $multiPoint = new MultiPoint([
        [
            -66.94410377620595,
            35.10276052573684
        ],
        [
            -68.13523213831431,
            32.41137944811656
        ]
    ]);
    $multiPoint->setProperties(['name' => 'City']);
    $geoJson = $multiPoint->asGeoJson(); // will return GeoJson Object
    $geoJsonString = $geoJson->asString(); // will return GeoJson String
    echo $geoJsonString.PHP_EOL;
} catch (InvalidFeatureTypeException $e) {
    echo $e->getMessage();
} catch (GeoJSONTypeIsNotDefined|InvalidGeoJSONInputException|InvalidGeoJSONTypeException $e) {
}

