<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

class MultiPolygon extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POLYGON;
}
