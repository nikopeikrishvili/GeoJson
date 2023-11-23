<?php

declare(strict_types=1);
namespace GeoJSON\GeoJSONTypes;

abstract class GeoJSONTypeAbstract implements GeoJSONTypeInterface
{
    protected GeoJSONTypeEnum $type;

    public function getType(): GeoJSONTypeEnum
    {
        return $this->type;
    }
}