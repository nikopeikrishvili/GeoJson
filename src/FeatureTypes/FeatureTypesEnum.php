<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

enum FeatureTypesEnum: string
{
    case POINT = 'Point';
    case MULTI_POINT = 'MultiPoint';
    case POLYGON = 'Polygon';
    case MULTI_POLYGON = 'MultiPolygon';
    case LINE_STRING = 'LineString';
    case MULTI_LINE_STRING = 'MultiLineString';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
