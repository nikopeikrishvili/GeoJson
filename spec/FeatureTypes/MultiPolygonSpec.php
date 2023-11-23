<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiPolygon;
use PhpSpec\ObjectBehavior;

class MultiPolygonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MultiPolygon::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_multi_polygon_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::MULTI_POLYGON);
    }
}
