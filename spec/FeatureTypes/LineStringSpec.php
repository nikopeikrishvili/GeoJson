<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\LineString;
use PhpSpec\ObjectBehavior;

class LineStringSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(LineString::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_linestring_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::LINE_STRING);
    }
}
