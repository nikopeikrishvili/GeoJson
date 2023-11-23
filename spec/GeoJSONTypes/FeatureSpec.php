<?php

namespace spec\GeoJSON\GeoJSONTypes;

use GeoJSON\GeoJSONTypes\Feature;
use GeoJSON\GeoJSONTypes\GeoJSONTypeAbstract;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use PhpSpec\ObjectBehavior;

class FeatureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Feature::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(GeoJSONTypeAbstract::class);
    }
    function it_should_return_feature_type()
    {
        $this->getType()->shouldReturn(GeoJSONTypeEnum::FEATURE);
    }
}
