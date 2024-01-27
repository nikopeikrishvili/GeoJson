<?php

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\FeatureInterface;

interface GeoJSONTypeInterface
{
    public function getType(): GeoJSONTypeEnum;

    public function isCollection(): bool;

    public function getProperties(): object;

    public function getGeometry(): FeatureInterface;

    public function asArray(): array;
}
