<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class Point extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::POINT;

    public function __construct(array $coordinates)
    {
        parent::__construct($coordinates);
    }

    /**
     * @throws InvalidFeatureException
     */
    public function validate(): void
    {
        // Coordinate can have elevation as third value
        if(count($this->coordinates) > 3 || count($this->coordinates) < 2) {
            throw new InvalidFeatureException('Point coordinates must be an array of two numbers');
        }
        if(!is_numeric($this->coordinates[0]) || !is_numeric($this->coordinates[1])) {
            throw new InvalidFeatureException('Point coordinates should be numeric');
        }
    }

}
