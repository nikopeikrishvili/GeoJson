<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

final class MultiPoint extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POINT;

    public function validate(): void
    {
    }
}
