<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\FeatureTypeIsNotSupported;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\Exceptions\MissingFieldException;

final class FeatureCollection extends GeoJSONTypeAbstract
{
    protected GeoJSONTypeEnum $type = GeoJSONTypeEnum::FEATURE_COLLECTION;
    protected array $features = [];

    /**
     * @throws InvalidGeoJSONTypeException
     */
    public function __construct(array $data)
    {
        $this->checkType($data);
    }

    /**
     * @param  array  $feature
     * @return void
     * @throws InvalidGeoJSONTypeException
     * @throws FeatureTypeIsNotSupported
     * @throws MissingFieldException
     */
    public function addFeature(array $feature): void
    {
        $this->features[] = new Feature($feature);
    }

    /**
     * @throws InvalidGeoJSONTypeException
     * @throws FeatureTypeIsNotSupported
     * @throws MissingFieldException
     */
    public function setFeatures(array $features): void
    {
        foreach ($features as $feature) {
            $this->addFeature($feature);
        }
    }
}
