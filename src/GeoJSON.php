<?php

declare(strict_types=1);

namespace GeoJSON;

use Exception;
use GeoJSON\Exceptions\GeoJSONTypeIsNotDefined;
use GeoJSON\Exceptions\InvalidGeoJSONInputException;
use GeoJSON\Exceptions\InvalidGeoJSONTypeException;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\GeoJSONTypes\FeatureCollection;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use stdClass;

final class GeoJSON
{
    private FeatureCollection $featureCollection;
    private FeatureTypesEnum|GeoJSONTypeEnum $type;
    private bool $assigned = false;

    /**
     * @param  string|stdClass|array  $data
     * @throws GeoJSONTypeIsNotDefined
     * @throws InvalidGeoJSONInputException
     * @throws InvalidGeoJSONTypeException
     * @throws Exception
     */
    public function __construct(string|stdClass|array $data)
    {
        $geojson = $this->determineAndReturnGeoJSON($data);
        $this->geoJsonTypes($geojson);
        $this->featureTypes($geojson);
        if (!$this->assigned) {
            throw new Exception('GeoJSON type is not supported, supported Types'.implode(',',
                    GeoJSONTypeEnum::values()).','.implode(',', FeatureTypesEnum::values()));
        }
        $this->type = GeoJSONTypeEnum::FEATURE_COLLECTION;
    }

    /**
     * @param  string|stdClass|array  $data
     * @return array
     * @throws GeoJSONTypeIsNotDefined
     * @throws InvalidGeoJSONInputException
     * @throws Exception
     */
    private function determineAndReturnGeoJSON(string|stdClass|array $data): array
    {
        return match (getType($data)) {
            'string' => $this->fromText($data),
            'array' => $this->fromArray($data),
            'object' => $this->fromObject($data),
        };
    }

    /**
     * @param  string  $geojson
     * @return array
     * @throws GeoJSONTypeIsNotDefined
     * @throws InvalidGeoJSONInputException
     */
    private function fromText(string $geojson): array
    {
        /**
         * @var array $object
         */
        $object = json_decode($geojson, true);
        return $this->fromArray($object);
    }

    /**
     * @param  array  $geojson
     * @return array
     * @throws GeoJSONTypeIsNotDefined
     * @throws InvalidGeoJSONInputException
     */
    private function fromArray(array $geojson): array
    {
        if (!$geojson) {
            throw new InvalidGeoJSONInputException('Given GeoJSON is not valid');
        }
        if (!key_exists('type', $geojson)) {
            throw new GeoJSONTypeIsNotDefined('There is no type attribute');
        }
        return $geojson;
    }

    /**
     * @param  stdClass  $geojson
     * @return array
     * @throws GeoJSONTypeIsNotDefined
     * @throws InvalidGeoJSONInputException
     */
    private function fromObject(stdClass $geojson): array
    {
        $jsonString = json_encode($geojson);
        if(!is_string($jsonString)){
            throw new InvalidGeoJSONInputException('Given GeoJSON is not valid');
        }
        /**
         * @var array $data
         */
        $data = json_decode($jsonString, true);
        if(!is_array($data)){
            throw new InvalidGeoJSONInputException('Given GeoJSON is not valid');
        }
        return $this->fromArray($data);
    }

    /**
     * @param  array  $geojson
     * @return void
     * @throws Exceptions\FeatureTypeIsNotSupported
     * @throws Exceptions\MissingFieldException
     * @throws InvalidGeoJSONTypeException|Exceptions\InvalidFeatureTypeException
     */
    private function geoJsonTypes(array $geojson): void
    {
        if (GeoJSONTypeEnum::tryFrom($geojson['type']) === GeoJSONTypeEnum::FEATURE_COLLECTION) {
            $this->featureCollection = new FeatureCollection($geojson);
            $this->assigned = true;
        }
        if (GeoJSONTypeEnum::tryFrom($geojson['type']) === GeoJSONTypeEnum::FEATURE) {
            $this->featureCollection = new FeatureCollection([
                'type' => GeoJSONTypeEnum::FEATURE_COLLECTION->value, 'features' => [$geojson]
            ]);
            $this->assigned = true;
        }
    }

    public function getFeatureCollection(): FeatureCollection
    {
        return $this->featureCollection;
    }

    public function getType(): FeatureTypesEnum|GeoJSONTypeEnum
    {
        return $this->type;
    }

    /**
     * @param  array  $geojson
     * @return void
     * @throws Exceptions\FeatureTypeIsNotSupported
     * @throws Exceptions\MissingFieldException
     * @throws InvalidGeoJSONTypeException|Exceptions\InvalidFeatureTypeException
     */
    private function featureTypes(array $geojson): void
    {
        if (in_array($geojson['type'], FeatureTypesEnum::values())) {
            $this->featureCollection = new FeatureCollection(
                [
                    'type' => GeoJSONTypeEnum::FEATURE_COLLECTION->value,
                    'features' => [
                        [
                            'type' => GeoJSONTypeEnum::FEATURE->value,
                            'properties' => [],
                            'geometry' => $geojson
                        ]
                    ]
                ]
            );

            $this->assigned = true;
        }
    }

    /**
     * Return GeoJSON as array
     * @return array
     */
    public function asArray(): array
    {
        return $this->getFeatureCollection()->asArray();
    }

    /**
     * Return GeoJSON as string
     * @return string
     * @throws InvalidGeoJSONInputException
     */
    public function asString(): string
    {
        $json = json_encode($this->asArray());
        if(!$json){
            throw new InvalidGeoJSONInputException('Generated GeoJSON is not valid');
        }
        return $json;
    }
}
