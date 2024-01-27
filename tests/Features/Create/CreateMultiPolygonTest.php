<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiPolygon;
use GeoJSON\FeatureTypes\Polygon;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreateMultiPolygonTest extends TestCase
{
    public function testMultiPolygonWillBeCreated(): void
    {
        $multiPolygon = new MultiPolygon($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::MULTI_POLYGON, $multiPolygon->getType());
        $this->assertEquals($this->getCoordinates(), $multiPolygon->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $multiPolygon->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::MULTI_POLYGON,
            $multiPolygon->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($multiPolygon->getCoordinates(),
            $multiPolygon->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    private function getCoordinates(): array
    {
        return [
            [
                [[
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
                ]]
            ],
            [
                [[
                    -70.52624140081778,
                    26.116471351241017
                ],
                [
                    -70.52624140081778,
                    24.884194615131364
                ],
                [
                    -68.14380162385831,
                    24.884194615131364
                ],
                [
                    -68.14380162385831,
                    26.116471351241017
                ],
                [
                    -70.52624140081778,
                    26.116471351241017
                ]]
            ]
        ];
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $multiPolygon = new MultiPolygon($this->getCoordinates());
        $geojson = $multiPolygon->asGeoJson();
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"MultiPolygon","coordinates":[[[[-72.04315136683675,29.451187895050822],[-72.04315136683675,27.849712263460177],[-68.23275413868745,27.849712263460177],[-68.23275413868745,29.451187895050822],[-72.04315136683675,29.451187895050822]]],[[[-70.52624140081778,26.116471351241017],[-70.52624140081778,24.884194615131364],[-68.14380162385831,24.884194615131364],[-68.14380162385831,26.116471351241017],[-70.52624140081778,26.116471351241017]]]]}}]}',
            $geojson->asString());
    }
}