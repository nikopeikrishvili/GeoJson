<?php

declare(strict_types=1);

namespace Unit;

use GeoJSON\GeoJSON;
use PHPUnit\Framework\TestCase;

class SourceStringTest extends TestCase
{
    public function testStdClassSourceIsSupported(): void
    {
        $point = '{"type":"Feature","properties":[],"geometry":{"type":"Point","coordinates":[-90,180]}}';
        $geojson = new GeoJSON($point);
        $this->assertInstanceOf(GeoJSON::class, $geojson);
    }
}