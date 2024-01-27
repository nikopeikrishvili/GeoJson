<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use GeoJSON\FeatureTypes\Polygon;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreatePolygonTest extends TestCase
{
    public function testPolygonWillBeCreated(): void
    {
        $polygon = new Polygon($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::POLYGON, $polygon->getType());
        $this->assertEquals($this->getCoordinates(), $polygon->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $polygon->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::POLYGON, $polygon->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($polygon->getCoordinates(), $polygon->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $polygon = new Polygon($this->getCoordinates());
        $geojson = $polygon->asGeoJson();
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[-72.04315136683675,29.451187895050822],[-72.04315136683675,27.849712263460177],[-68.23275413868745,27.849712263460177],[-68.23275413868745,29.451187895050822],[-72.04315136683675,29.451187895050822]]]}}]}',$geojson->asString());
    }

    private function getCoordinates():array
    {
        return [
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
        ];
    }
}