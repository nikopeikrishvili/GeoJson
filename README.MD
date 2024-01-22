# Validate GeoJson to [RFC 7946](https://datatracker.ietf.org/doc/html/rfc7946) standard

### Installation

```bash
composer require nikopeikrishvili/geojson
```
### Creating GeoJson Object

Work in progress ...


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
