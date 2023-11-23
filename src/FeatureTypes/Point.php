<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

class Point extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::POINT;
}