<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiPoint;
use PhpSpec\ObjectBehavior;

class MultiPointSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MultiPoint::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_multi_point_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::MULTI_POINT);
    }
}
