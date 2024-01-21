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

class PolygonTest extends TestCase
{
    /**
     * @throws InvalidGeoJSONTypeException
     * @throws InvalidGeoJSONInputException
     * @throws GeoJSONTypeIsNotDefined
     */
    public function testPolygonFeatureCollection(): void
    {
        $data = file_get_contents(__DIR__.'/../../spec/assets/plain_polygon.json');
        $geojson = new GeoJSON($data);
        $this->assertInstanceOf(GeoJSON::class, $geojson);
        $this->assertEquals(GeoJSONTypeEnum::FEATURE_COLLECTION, $geojson->getType());
        $this->assertInstanceOf(FeatureCollection::class, $geojson->getFeatureCollection());
        $this->assertCount(1, $geojson->getFeatureCollection()->getFeatures());
    }

    /**
     * @throws InvalidGeoJSONTypeException
     * @throws InvalidGeoJSONInputException
     * @throws GeoJSONTypeIsNotDefined
     */
    public function testPolygonFeatureInFeatureCollection(): void
    {
        $data = file_get_contents(__DIR__.'/../../spec/assets/plain_polygon.json');
        $geojson = new GeoJSON($data);
        $this->assertEquals(GeoJSONTypeEnum::FEATURE, $geojson->getFeatureCollection()->getFeatures()[0]->getType());
    }

    /**
     * @throws InvalidGeoJSONTypeException
     * @throws InvalidGeoJSONInputException
     * @throws GeoJSONTypeIsNotDefined
     */
    public function testPolygonFeatureEmptyProperties(): void
    {
        $geojson = new GeoJSON($this->getPolygonGeoJson());
        $this->assertCount(0, $geojson->getFeatureCollection()->getFeatures()[0]->getProperties());
    }
    /**
     * @throws InvalidGeoJSONTypeException
     * @throws InvalidGeoJSONInputException
     * @throws GeoJSONTypeIsNotDefined
     */
    public function testPolygonFeatureNotEmptyProperties(): void
    {
        $data = $this->getPolygonGeoJson();
        $data['properties'] = ['foo' => 'bar', 'bar' => 'foo'];
        $geojson = new GeoJSON($data);
        $this->assertCount(2, $geojson->getFeatureCollection()->getFeatures()[0]->getProperties());
    }
    public function testPolygonIsNotValid(): void
    {
        $data = $this->getPolygonGeoJson();
        $data['geometry']['coordinates'][0][0][0] = 34.502219028324;
        $this->expectException(InvalidFeatureException::class);
        $geojson = new GeoJSON($data);
    }
    private function getPolygonGeoJson(): array
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
                    ]
                ],
                'type' => 'Polygon'
            ]
        ];
    }
}