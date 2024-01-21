<?php

declare(strict_types=1);

namespace Features;

use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidFeatureException;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\GeoJSON;
use GeoJSON\GeoJSONTypes\FeatureCollection;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use PHPUnit\Framework\TestCase;

class MultiPolygonTest extends TestCase
{

    public function testMultiPolygonIsNotValid(): void
    {
        $data = $this->getMultiPolygonGeoJson();
        $data['geometry']['coordinates'][0][0][0] = 34.502219028324;
        $this->expectException(InvalidFeatureException::class);
        $geojson = new GeoJSON($data);
    }
    private function getMultiPolygonGeoJson(): array
    {
        return [
            'type' => 'Feature',
            'properties' => [],
            'geometry' => [
                'coordinates' => [
                    [
                        [-20.01426515213, 34.502219028323],
                        [-18.365650806102, 34.502219028323],
                        [-18.365650806102, 35.548141481836],
                        [-20.01426515213, 35.548141481836],
                        [-20.01426515213, 34.502219028323]
                    ],
                    [
                        [-20.01426515213, 34.502219028323],
                        [-18.365650806102, 34.502219028323],
                        [-18.365650806102, 35.548141481836],
                        [-20.01426515213, 35.548141481836],
                        [-20.01426515213, 34.502219028323]
                    ]
                ],
                'type' => 'MultiPolygon'
            ]
        ];
    }
}