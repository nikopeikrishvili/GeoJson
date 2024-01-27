<?php

namespace GeoJSON\FeatureTypes;

use GeoJSON\GeoJSON;

interface FeatureInterface
{
    public function getType(): FeatureTypesEnum;

    public function validate(): void;

    /**
     * @return array<int,array>
     */
    public function getCoordinates(): array;

    public function asArray(): array;

    public function asGeoJson(): GeoJSON;
}
