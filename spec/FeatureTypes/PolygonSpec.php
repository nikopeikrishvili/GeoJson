<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\Polygon;
use PhpSpec\ObjectBehavior;

class PolygonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Polygon::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_polygon_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::POLYGON);
    }
}
