<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;
namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class Polygon extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::POLYGON;

    public function validate(): void
    {
        if($this->coordinates[0][0] !== $this->coordinates[0][count($this->coordinates[0])-1]){
            throw new InvalidFeatureException('Polygon is not closed');
        }
    }
}
