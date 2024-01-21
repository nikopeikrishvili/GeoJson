<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class MultiPoint extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_POINT;

    public function validate(): void
    {
        foreach ($this->coordinates as $coordinate){
            if(count($coordinate) > 3 || count($coordinate) < 2) {
                throw new InvalidFeatureException('MultiPoint coordinates item must be an array of two numbers');
            }
            if(!is_numeric($coordinate[0]) || !is_numeric($coordinate[1])) {
                throw new InvalidFeatureException('MultiPoint coordinates item should be numeric');
            }
        }
    }
}
