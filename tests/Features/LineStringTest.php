<?php

declare(strict_types=1);

namespace Features;

use GeoJSON\Exceptions\InvalidFeatureException;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use PHPUnit\Framework\TestCase;

class LineStringTest extends TestCase
{
    public function testLineStringMustHaveAtLeastTwoCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('LineString must have at least 2 coordinates');
        $data = $this->getLineStringDataArray();
        unset($data['coordinates'][1]);
        new LineString($data['coordinates']);
    }

    public function testValidLineString(): void
    {
        $data = $this->getLineStringDataArray();
        $lineString = new LineString($data['coordinates']);
        $this->assertEquals(FeatureTypesEnum::LINE_STRING, $lineString->getType());
    }
    private function getLineStringDataArray(){
        return [
            'type' => 'LineString',
            'coordinates' => [
                [1, 2],
                [3, 4]
            ]
        ];
    }
}