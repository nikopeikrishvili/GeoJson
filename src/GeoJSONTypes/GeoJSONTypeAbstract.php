<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\FeatureInterface;

abstract class GeoJSONTypeAbstract implements GeoJSONTypeInterface
{
    protected GeoJSONTypeEnum $type;
    protected bool $isCollection = false;
    protected array $properties = [];
    protected FeatureInterface $geometry;

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

    public function getProperties(): object
    {
        return (object)$this->properties;
    }

    public function getGeometry(): FeatureInterface
    {
        return $this->geometry;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function asArray(): array
    {
        return [
            'type' => $this->getType(),
            'properties' => $this->getProperties(),
            'geometry' => $this->getGeometry()->asArray(),
        ];
    }
}
