<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\FeatureTypeIsNotSupported;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\Exceptions\MissingFieldException;
use GeoJSON\FeatureTypes\FeatureInterface;
use GeoJSON\FeatureTypes\FeatureTypesEnum;

class Feature extends GeoJSONTypeAbstract
{
    protected GeoJSONTypeEnum $type = GeoJSONTypeEnum::FEATURE;
    protected array $properties = [];
    protected FeatureInterface $geometry;

    /**
     * @throws InvalidGeoJSONTypeException
     * @throws MissingFieldException
     * @throws FeatureTypeIsNotSupported
     */
    public function __construct(array $geojson)
    {
        $this->checkType($geojson);
        if (key_exists('properties', $geojson) && is_array($geojson['properties'])) {
            $this->properties = $geojson['properties'];
        }
        if (!key_exists('geometry', $geojson)) {
            throw new MissingFieldException('geometry field is missing for feature');
        }
        if (!key_exists('type', $geojson)) {
            throw new MissingFieldException('type field is missing for feature');
        }
        if (!in_array($geojson['geometry']['type'], FeatureTypesEnum::values())) {
            throw new FeatureTypeIsNotSupported('Feature type '.$geojson['geometry']['type'].' is not supported, supported types : '.implode(',',
                    FeatureTypesEnum::values()));
        }
        $featureTypeClass = 'GeoJson\FeatureTypes\\'.FeatureTypesEnum::from($geojson['geometry']['type'])->value;
        $this->geometry = new $featureTypeClass;
    }
}
