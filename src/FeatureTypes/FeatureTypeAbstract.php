<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureTypeException;
use GeoJSON\Exceptions\MissingFieldException;

class FeatureTypeAbstract implements FeatureInterface
{
    protected FeatureTypesEnum $type;
    protected array $coordinates = [];

    /**
     * @throws InvalidFeatureTypeException
     * @throws MissingFieldException
     */
    public function __construct(array $geojson)
    {
        if (FeatureTypesEnum::from($geojson['type']) != $this->getType()) {
            throw new InvalidFeatureTypeException('Feature type is invalid');
        }
        if (!key_exists('coordinates', $geojson)) {
            throw  new MissingFieldException('Coordinates field is missing on feature type');
        }
        $this->coordinates = $geojson['coordinates'];
    }

    public function getType(): FeatureTypesEnum
    {
        return $this->type;
    }
}
