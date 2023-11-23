<?php

namespace spec\GeoJSON\GeoJSONTypes;

use GeoJSON\GeoJSONTypes\Feature;
use GeoJSON\GeoJSONTypes\GeoJSONTypeAbstract;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use PhpSpec\ObjectBehavior;

class FeatureSpec extends ObjectBehavior
{

    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(GeoJSONTypeAbstract::class);
    }
}
