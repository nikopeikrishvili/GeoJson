<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use GeoJSON\FeatureTypes\Point;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreateLineStringTest extends TestCase
{
    public function testLineStringWillBeCreated(): void
    {
        $linestring = new LineString($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::LINE_STRING, $linestring->getType());
        $this->assertEquals($this->getCoordinates(), $linestring->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $linestring->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::LINE_STRING, $linestring->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($linestring->getCoordinates(), $linestring->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $linestring = new LineString($this->getCoordinates());
        $geojson = $linestring->asGeoJson();
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"LineString","coordinates":[[-69.7347514408108,31.162478414516926],[-68.73265178050848,32.632923495493614],[-66.5543266232896,33.128544043762716]]}}]}',$geojson->asString());
    }

    private function getCoordinates():array
    {
        return [
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
        ];
    }
}