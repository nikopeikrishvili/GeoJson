<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;

abstract class GeoJSONTypeAbstract implements GeoJSONTypeInterface
{
    protected GeoJSONTypeEnum $type;

    public function getType(): GeoJSONTypeEnum
    {
        return $this->type;
    }

    /**
     * @throws InvalidGeoJSONTypeException
     */
    public function checkType(array $data): void
    {
        if(GeoJSONTypeEnum::from($data['type']) != $this->getType()){
            throw new InvalidGeoJSONTypeException('Geojson type is invalid');
        }
    }
}
