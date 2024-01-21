<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

final class Point extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::POINT;

    public function validate(): void
    {
    }
}
