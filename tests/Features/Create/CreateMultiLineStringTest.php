<?php

declare(strict_types=1);

namespace Features\Create;

use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use GeoJSON\FeatureTypes\MultiLineString;
use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class CreateMultiLineStringTest extends TestCase
{
    public function testMultiLineStringWillBeCreated(): void
    {
        $multiLineString = new MultiLineString($this->getCoordinates());
        $this->assertEquals(FeatureTypesEnum::MULTI_LINE_STRING, $multiLineString->getType());
        $this->assertEquals($this->getCoordinates(), $multiLineString->getCoordinates());
        $this->assertInstanceOf(GeoJSON::class, $multiLineString->asGeoJson());
        $this->assertEquals(FeatureTypesEnum::MULTI_LINE_STRING, $multiLineString->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getType());
        $this->assertEquals($multiLineString->getCoordinates(), $multiLineString->asGeoJson()->getFeatureCollection()->getFeatures()[0]->getGeometry()->getCoordinates());
    }

    public function testValidGeoJsonStringWillBeReturned(): void
    {
        $multiLineString = new MultiLineString($this->getCoordinates());
        $geojson = $multiLineString->asGeoJson();
        $this->assertEquals('{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"MultiLineString","coordinates":[[[-68.5513197727071,33.99521095890789],[-67.78653620416506,35.99451263925742]],[[-69.53443935452637,33.108664189620654],[-66.71821468545821,33.88049247462571],[-66.04626607277956,32.59053285577045]]]}}]}',$geojson->asString());
    }

    private function getCoordinates():array
    {
        return [
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
        ];
    }
}