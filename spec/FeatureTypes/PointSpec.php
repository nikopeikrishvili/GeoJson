<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\Point;
use PhpSpec\ObjectBehavior;

class PointSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Point::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_point_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::POINT);
    }
}
