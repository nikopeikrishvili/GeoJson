<?php

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidFeatureTypeException;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\Point;

require_once __DIR__.'/../../vendor/autoload.php';

try {
    $point = new Point([-180, 90]);
    $point->setProperties(['name' => 'City']);
    $geoJson = $point->asGeoJson(); // will return GeoJson Object
    $geoJsonString = $geoJson->asString(); // will return GeoJson String
    echo $geoJsonString.PHP_EOL;
} catch (InvalidFeatureTypeException $e) {
    echo $e->getMessage();
} catch (GeoJSONTypeIsNotDefined|InvalidGeoJSONInputException|InvalidGeoJSONTypeException $e) {
}

