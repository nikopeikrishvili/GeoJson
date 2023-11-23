<?php

declare(strict_types=1);

enum FeatureTypesEnum: string
{
    case POINT = 'Point';
    case MULTI_POINT = 'MultiPoint';
    case POLYGON = 'Polygon';
    case MULTI_POLYGON = 'MultiPolygon';
    case LINE_STRING = 'LineString';
    case MULTI_LINE_STRING = 'MultiLineString';
}