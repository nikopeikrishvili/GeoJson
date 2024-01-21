<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class LineString extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::LINE_STRING;

    /**
     * @throws InvalidFeatureException
     */
    public function validate(): void
    {
        if(count($this->coordinates) < 2) {
            throw new InvalidFeatureException('LineString must have at least 2 coordinates');
        }
    }
}
