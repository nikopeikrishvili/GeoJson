<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;

abstract class GeoJSONTypeAbstract implements GeoJSONTypeInterface
{
    protected GeoJSONTypeEnum $type;
    protected bool $isCollection = false;

    public function getType(): GeoJSONTypeEnum
    {
        return $this->type;
    }

    public function isCollection(): bool
    {
        return $this->isCollection;
    }

    /**
     * @throws InvalidGeoJSONTypeException
     */
    protected function checkType(array $data): void
    {
        if(GeoJSONTypeEnum::from($data['type']) != $this->getType()){
            throw new InvalidGeoJSONTypeException('Geojson type is invalid');
        }
    }
}
