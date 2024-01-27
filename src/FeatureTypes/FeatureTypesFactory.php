<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\FeatureTypeIsNotSupported;
use GeoJSON\Exceptions\InvalidFeatureTypeException;
use GeoJSON\Exceptions\MissingFieldException;

class FeatureTypesFactory
{
    /**
     * @param  FeatureTypesEnum  $featureType
     * @param  array  $featureTypeData
     * @return FeatureInterface
     * @throws InvalidFeatureTypeException
     */
    public static function createFeatureType(FeatureTypesEnum $featureType, array $featureTypeData): FeatureInterface
    {
        return match ($featureType) {
            FeatureTypesEnum::POINT => new Point($featureTypeData),
            FeatureTypesEnum::MULTI_POINT => new MultiPoint($featureTypeData),
            FeatureTypesEnum::POLYGON => new Polygon($featureTypeData),
            FeatureTypesEnum::MULTI_POLYGON => new MultiPolygon($featureTypeData),
            FeatureTypesEnum::LINE_STRING => new LineString($featureTypeData),
            FeatureTypesEnum::MULTI_LINE_STRING => new MultiLineString($featureTypeData),
        };
    }
}