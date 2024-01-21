<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

final class MultiPolygon extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POLYGON;

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }
}
