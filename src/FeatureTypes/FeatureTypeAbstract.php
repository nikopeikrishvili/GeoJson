<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureInterface;

class FeatureTypeAbstract implements FeatureInterface
{
    protected FeatureTypesEnum $type;
    public function getType(): FeatureTypesEnum
    {
        return $this->type;
    }
}