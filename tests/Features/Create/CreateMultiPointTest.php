<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiPoint;
use GeoJSON\FeatureTypes\Point;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreateMultiPointTest extends TestCase
{
    public function testMultiPointWillBeCreated(): void
    {
        $multiPoint = new MultiPoint($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::MULTI_POINT, $multiPoint->getType());
        $this->assertEquals($this->getCoordinates(), $multiPoint->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $multiPoint->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::MULTI_POINT, $multiPoint->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($multiPoint->getCoordinates(), $multiPoint->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $multiPoint = new MultiPoint($this->getCoordinates());
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"MultiPoint","coordinates":[[-66.94410377620595,35.10276052573684],[-68.13523213831431,32.41137944811656]]}}]}',$multiPoint->asGeoJson()->asString());
    }

    public function getCoordinates(): array
    {
        return [
            [
                -66.94410377620595,
                35.10276052573684
            ],
            [
                -68.13523213831431,
                32.41137944811656
            ]
        ];
    }
}