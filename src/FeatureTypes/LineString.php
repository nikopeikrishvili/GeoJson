<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

final class LineString extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::LINE_STRING;
}
