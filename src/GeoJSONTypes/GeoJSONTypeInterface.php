<?php

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;

interface GeoJSONTypeInterface
{
    public function getType(): GeoJSONTypeEnum;

    public function isCollection(): bool;
}
