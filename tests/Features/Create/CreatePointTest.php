<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\Point;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreatePointTest extends TestCase
{
    public function testPointWillBeCreated(): void
    {
        $point = new Point($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::POINT, $point->getType());
        $this->assertEquals($this->getCoordinates(), $point->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $point->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::POINT, $point->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($point->getCoordinates(), $point->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $point = new Point($this->getCoordinates());
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"Point","coordinates":[-66.94410377620595,35.10276052573684]}}]}',$point->asGeoJson()->asString());
    }
    public function getCoordinates(): array
    {
        return [-66.94410377620595,
                35.10276052573684
        ];
    }
}