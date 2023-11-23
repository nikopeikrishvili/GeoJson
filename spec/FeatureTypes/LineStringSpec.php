<?php

namespace spec\GeoJSON\FeatureTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use PhpSpec\ObjectBehavior;

class LineStringSpec extends ObjectBehavior
{
    function it_is_extending_abstract_type(): void
    {
        $this->beAnInstanceOf(FeatureTypeAbstract::class);
    }
}
