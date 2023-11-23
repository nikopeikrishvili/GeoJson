<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

class MultiPoint extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POINT;
}
