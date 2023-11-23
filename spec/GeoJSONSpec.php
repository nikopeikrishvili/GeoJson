<?php

namespace spec\GeoJSON;

use GeoJSON\GeoJSON;
use GeoJSON\GeoJSONTypes\FeatureCollection;
use GeoJSON\GeoJSONTypes\GeoJSONTypeEnum;
use PhpSpec\ObjectBehavior;

class GeoJSONSpec extends ObjectBehavior
{

    function it_sould_return_feature_collection_type(){
        $file = __DIR__.'/assets/feature_without_collection.json';
        $data = file_get_contents($file);
        $this->beConstructedWith($data);
        $this->getType()->shouldBe(GeoJSONTypeEnum::FEATURE_COLLECTION);
        $this->getFeatureCollection()->beAnInstanceOf(FeatureCollection::class);
    }
}
