<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class MultiPolygon extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POLYGON;

    public function validate(): void
    {
        foreach ($this->coordinates as $coordinate){
            if($coordinate[0] !== end($coordinate)){
                throw new InvalidFeatureException('MultiPolygon item is not closed');
            }
        }
    }
}
