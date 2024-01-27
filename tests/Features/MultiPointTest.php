<?php

declare(strict_types=1);

namespace Features;

use GeoJSON\Exceptions\InvalidFeatureException;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiPoint;
use GeoJSON\FeatureTypes\Point;
use PHPUnit\Framework\TestCase;

class MultiPointTest extends TestCase
{

    public function testMultiPointShouldHaveTwoCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('MultiPoint coordinates item must be an array of two numbers');
        $data = $this->getMultiPointDataArray();
        unset($data['coordinates'][0][1]);
        new MultiPoint($data['coordinates']);
    }
    public function testMultiPointShouldHaveNumericCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('MultiPoint coordinates item should be numeric');
        $data = $this->getMultiPointDataArray();
        $data['coordinates'][0][1] = 'a';
        new MultiPoint($data['coordinates']);
    }
    public function testMultiPointShouldNotHaveMoreThanCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('MultiPoint coordinates item must be an array of two numbers');
        $data = $this->getMultiPointDataArray();
        $data['coordinates'][0][2] = 3;
        $data['coordinates'][0][3] = 4;
        new MultiPoint($data['coordinates']);
    }
    public function testMultiPointCanHaveTwoCoordinates(): void
    {
        $data = $this->getMultiPointDataArray();

        $point = new MultiPoint($data['coordinates']);
        $this->assertEquals(FeatureTypesEnum::MULTI_POINT, $point->getType());
        $this->assertEquals([100.0, 0.0], $point->getCoordinates()[0]);
    }
    public function testMultiPointCanHaveTreeCoordinates(): void
    {
        $data = $this->getMultiPointDataArray();
        $data['coordinates'][0][2] = 3;
        $point = new MultiPoint($data['coordinates']);
        $this->assertEquals(FeatureTypesEnum::MULTI_POINT, $point->getType());
        $this->assertEquals([100.0, 0.0, 3], $point->getCoordinates()[0]);
    }
    private function getMultiPointDataArray(){
        return [
            'type' => 'MultiPoint',
            'coordinates' => [
                [100.0, 0.0],
                [101.0, 1.0]
            ]
        ];
    }
}