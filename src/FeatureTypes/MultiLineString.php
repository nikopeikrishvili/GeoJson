<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

final class MultiLineString extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_LINE_STRING;

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }
}
