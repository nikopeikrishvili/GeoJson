<?php

namespace GeoJSON\GeoJSONTypes;

enum GeoJSONTypeEnum: string
{
    case FEATURE = 'Feature';
    case FEATURE_COLLECTION = 'FeatureCollection';
}
