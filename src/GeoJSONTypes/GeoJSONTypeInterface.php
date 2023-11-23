<?php

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;

interface GeoJSONTypeInterface
{
    public function getType(): GeoJSONTypeEnum;
    /**
     * @throws InvalidGeoJSONTypeException
     */
    public function checkType(array $data): void;
}
