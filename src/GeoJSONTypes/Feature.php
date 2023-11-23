<?php

declare(strict_types=1);
namespace GeoJSON\GeoJSONTypes;

class Feature extends GeoJSONTypeAbstract
{
    protected GeoJSONTypeEnum $type = GeoJSONTypeEnum::FEATURE;
}