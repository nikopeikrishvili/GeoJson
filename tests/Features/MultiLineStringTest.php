<?php

declare(strict_types=1);

namespace Features;

use GeoJSON\Exceptions\InvalidFeatureException;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use GeoJSON\FeatureTypes\MultiLineString;
use PHPUnit\Framework\TestCase;

class MultiLineStringTest extends TestCase
{
    public function testLineStringMustHaveAtLeastTwoCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('Every item in MultiLineString must have at least 2 coordinates');
        $data = $this->getMultiLineStringDataArray();
        unset($data['coordinates'][0][1]);
        new MultiLineString($data['coordinates']);
    }
    public function testValidLineString(): void
    {
        $data = $this->getMultiLineStringDataArray();
        $multiLineString = new MultiLineString($data['coordinates']);
        $this->assertEquals(FeatureTypesEnum::MULTI_LINE_STRING, $multiLineString->getType());
    }
    private function getMultiLineStringDataArray(){
        return [
            'type' => 'MultiLineString',
            'coordinates' => [
                [
                    [100.0, 0.0],
                    [101.0, 1.0]
                ],
                [
                    [102.0, 2.0],
                    [103.0, 3.0]
                ]
            ]
        ];
    }
}