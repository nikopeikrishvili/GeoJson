<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use Exception;
use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\GeoJSON;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;

abstract class FeatureTypeAbstract implements FeatureInterface
{
    protected FeatureTypesEnum $type;
    protected array $coordinates = [];
    protected array $properties = [];

    /**
     */
    public function __construct(array $coordinates)
    {
        $this->coordinates = $coordinates;
        $this->validate();
    }

    public function getType(): FeatureTypesEnum
    {
        return $this->type;
    }



    abstract public function validate(): void;

    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    public function asArray(): array
    {
        return [
            'type' => $this->getType()->value,
            'coordinates' => $this->getCoordinates(),
        ];
    }

    /**
     * @throws InvalidGeoJSONTypeException
     * @throws InvalidGeoJSONInputException
     * @throws GeoJSONTypeIsNotDefined
     */
    public function asGeoJson(): GeoJSON
    {
        return new GeoJSON([
            'type'=>GeoJSONTypeEnum::FEATURE->value,
            'geometry'=>$this->asArray(),
            'properties'=>$this->properties,
        ]);
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }
}
