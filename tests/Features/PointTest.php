<?php

declare(strict_types=1);

namespace Features;

use GeoJSON\Exceptions\InvalidFeatureException;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{

    public function testPointShouldHaveTwoCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('Point coordinates must be an array of two numbers');
        $data = $this->getPointDataArray();
        unset($data['coordinates'][1]);
        new Point($data);
    }
    public function testPointShouldHaveNumericCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('Point coordinates should be numeric');
        $data = $this->getPointDataArray();
        $data['coordinates'][1] = 'a';
        new Point($data);
    }
    public function testPointShouldNotHaveMoreThanCoordinates(): void
    {
        $this->expectException(InvalidFeatureException::class);
        $this->expectExceptionMessage('Point coordinates must be an array of two numbers');
        $data = $this->getPointDataArray();
        $data['coordinates'][2] = 3;
        $data['coordinates'][3] = 4;
        new Point($data);
    }
    public function testPointCanHaveTwoCoordinates(): void
    {
        $data = $this->getPointDataArray();

        $point = new Point($data);
        $this->assertEquals(FeatureTypesEnum::POINT, $point->getType());
        $this->assertEquals([1, 2], $point->getCoordinates());
    }
    public function testPointCanHaveTreeCoordinates(): void
    {
        $data = $this->getPointDataArray();
        $data['coordinates'][2] = 3;
        $point = new Point($data);
        $this->assertEquals(FeatureTypesEnum::POINT, $point->getType());
        $this->assertEquals([1, 2, 3], $point->getCoordinates());
    }
    private function getPointDataArray(){
        return [
            'type' => 'Point',
            'coordinates' => [1, 2]
        ];
    }
}