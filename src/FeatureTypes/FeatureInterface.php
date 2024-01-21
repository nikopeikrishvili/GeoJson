<?php

namespace GeoJSON\FeatureTypes;

interface FeatureInterface
{
    public function getType(): FeatureTypesEnum;

    public function validate(): void;

    /**
     * @return array<int,array>
     */
    public function getCoordinates(): array;
}
