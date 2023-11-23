<?php

namespace GeoJSON\FeatureTypes;

interface FeatureInterface
{
    public function getType(): FeatureTypesEnum;
}
