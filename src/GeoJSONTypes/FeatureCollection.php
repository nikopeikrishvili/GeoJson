<?php

declare(strict_types=1);

namespace GeoJSON\GeoJSONTypes;

use GeoJSON\Exceptions\FeatureTypeIsNotSupported;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\Exceptions\MissingFieldException;

final class FeatureCollection extends GeoJSONTypeAbstract
{
    protected GeoJSONTypeEnum $type = GeoJSONTypeEnum::FEATURE_COLLECTION;
    /**
     * @var Feature[] $features
     */
    protected array $features = [];

    /**
     * @param  array  $data
     * @throws FeatureTypeIsNotSupported
     * @throws InvalidGeoJSONTypeException
     * @throws MissingFieldException
     */
    public function __construct(array $data)
    {
        $this->checkType($data);
        if(!key_exists('features', $data)){
            throw new MissingFieldException('Features field is missing from features collection');
        }
        $this->setFeatures($data['features']);
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

    /**
     * @return Feature[]
     */
    public function getFeatures(): array
    {
        return $this->features;
    }
}
