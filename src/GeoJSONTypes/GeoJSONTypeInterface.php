<?php

namespace GeoJSON\GeoJSONTypes;

interface GeoJSONTypeInterface
{
    public function getType(): GeoJSONTypeEnum;
}
