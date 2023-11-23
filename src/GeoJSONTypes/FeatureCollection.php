<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

class FeatureCollection extends GeoJSONTypeAbstract
{
    protected GeoJSONTypeEnum $type = GeoJSONTypeEnum::FEATURE_COLLECTION;
}
