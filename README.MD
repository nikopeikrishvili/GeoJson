# Validate GeoJson to [RFC 7946](https://datatracker.ietf.org/doc/html/rfc7946) standard

### Installation

The library is published as a
[package](https://packagist.org/packages/nikopeikrishvili/geojson) and is installable via
[Composer](http://getcomposer.org/):

```bash
composer require nikopeikrishvili/geojson
```
## Creating GeoJson Object


You can create Feature object and extract GeoJson string from it, you need just provide Coordinates, for example :
### Polygon
```php
$feature = new GeoJSON\FeatureTypes\Polygon([/**coordinates array**/]);
```
### Multi Polygon
```php
$feature = new GeoJSON\FeatureTypes\MultiPolygon([/**coordinates array**/]);
```
### Point
```php

$feature = new GeoJSON\FeatureTypes\Point([/**coordinates array**/]);
```
### Multi Point
```php

$feature = new GeoJSON\FeatureTypes\MultiPoint([/**coordinates array**/]);
```
### LineString
```php

$feature = new GeoJSON\FeatureTypes\LineString([/**coordinates array**/]);
```
### MultiLineString

```php

$feature = new GeoJSON\FeatureTypes\MultiLineString([/**coordinates array**/]);
```
### Generate GeoJson String
```php
$geoJson = $feature->asGeoJson();
$geoJsonString = $geoJson->asString();
echo $geoJsonString.PHP_EOL;
```
```json
{
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Polygon",
        "coordinates": [
          [
            [
              -72.04315136683675,
              29.451187895050822
            ],
            [
              -72.04315136683675,
              27.849712263460177
            ],
            [
              -68.23275413868745,
              27.849712263460177
            ],
            [
              -68.23275413868745,
              29.451187895050822
            ],
            [
              -72.04315136683675,
              29.451187895050822
            ]
          ]
        ]
      }
    }
  ]
}

```
## Examples :
[Polygon](examples/create/create-polygon.php) - Create Polygon Feature \
[Point](examples/create/create-point.php) - Create Point Feature \
[MultiPolygon](examples/create/create-multipolygon.php) - Create MultiPolygon Feature \
[MultiPoint](examples/create/create-multipoint.php) - Create MultiPoint Feature \
[LineString](examples/create/create-linestring.php) - Create LineString Feature \
[MultiLineString](examples/create/create-multilinestring.php) - Create MultiLineString Feature
### GeoJson as Object
You can use this library to validate GeoJson to [RFC 7946](https://datatracker.ietf.org/doc/html/rfc7946) standard

Currently, it supports following GeoJson types: \
[Polygon](examples/polygon.php) - Polygon Feature \
[Point](examples/point.php) - Point Feature \
[MultiPolygon](examples/multipolygon.php) - MultiPolygon Feature \
[MultiPoint](examples/multipoint.php) - MultiPoint Feature \
[LineString](examples/linestring.php) - LineString Feature \
[MultiLineString](examples/multilinestring.php) - MultiLineString Feature 

Package supports stdclass, string and array as an input

```php

// String Based
$point = '{"type":"Feature","properties":[],"geometry":{"type":"Point","coordinates":[-90,180]}}';
$geojson = new GeoJSON($point);

// Array Based
$geojson = new GeoJSON([
    'type' => 'Feature',
    'properties' => [],
    'geometry' => [
        'type' => 'Point',
        'coordinates' => [-90, 180]
    ]
]);
// StdClass Based
$point = '{"type":"Feature","properties":[],"geometry":{"type":"Point","coordinates":[-90,180]}}';
$geojson = new GeoJSON(json_decode($point));
```

Note: if your geojson starts with Feature instead of FeatureCollection, package will wrap it with FeatureCollection
