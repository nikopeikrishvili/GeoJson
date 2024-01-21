<?php

declare(strict_types=1);

namespace GeoJSON\FeatureTypes;

use GeoJSON\Exceptions\InvalidFeatureException;

final class MultiLineString extends FeatureTypeAbstract
{
    protected FeatureTypesEnum $type = FeatureTypesEnum::MULTI_LINE_STRING;

    /**
     * @throws InvalidFeatureException
     */
    public function validate(): void
    {
        foreach ($this->coordinates as $lineString) {
            if (count($lineString) < 2) {
                throw new InvalidFeatureException('Every item in MultiLineString must have at least 2 coordinates');
            }
        }
    }
}
