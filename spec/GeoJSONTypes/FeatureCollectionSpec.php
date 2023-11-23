<?php

namespace spec\GeoJSON\GeoJSONTypes;

use GeoJSON\FeatureTypes\FeatureTypeAbstract;
use GeoJSON\FeatureTypes\FeatureTypesEnum;
use GeoJSON\GeoJSONTypes\FeatureCollection;
use GeoJSON\GeoJSONTypes\GeoJSONTypeAbstract;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use PhpSpec\ObjectBehavior;

class FeatureCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
//        $this->shouldHaveType(FeatureCollection::class);
    }
    function it_is_extending_abstract_type()
    {
        $this->beAnInstanceOf(GeoJSONTypeAbstract::class);
    }
    function it_should_return_feature_collection_type()
    {
        $this->beConstructedWith(['type'=>'FeatureCollection']);
        $this->getType()->shouldReturn(GeoJSONTypeEnum::FEATURE_COLLECTION);
    }
}
