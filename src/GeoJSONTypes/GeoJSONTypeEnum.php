<?php

namespace GeoJSON\GeoJSONTypes;

enum GeoJSONTypeEnum: string
{
    case FEATURE = 'Feature';
    case FEATURE_COLLECTION = 'FeatureCollection';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
