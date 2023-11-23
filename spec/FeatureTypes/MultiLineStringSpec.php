<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\FeatureTypes\MultiLineString;
use PhpSpec\ObjectBehavior;

class MultiLineStringSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MultiLineString::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
    function it_should_return_multi_line_type()
    {
        $this->getType()->shouldReturn(FeatureTypesEnum::MULTI_LINE_STRING);
    }
}
