<?php

namespace App\Sharp;

use App\Feature;
use App\Sharp\Commands\FeatureReorderHandler;
use Code16\Sharp\EntityList\Containers\EntityListDataContainer;
use Code16\Sharp\EntityList\EntityListQueryParams;
use Code16\Sharp\EntityList\SharpEntityList;

class FeatureSharpList extends SharpEntityList
{

    function buildListDataContainers()
    {
        $this->addDataContainer(
            EntityListDataContainer::make("name")
                ->setLabel("Name")
        );
    }

    function buildListConfig()
    {
        $this->setReorderable(new FeatureReorderHandler());
    }

    function buildListLayout()
    {
        $this->addColumn("name", 12);
    }

    function getListData(EntityListQueryParams $params)
    {
        return $this->transform(
            Feature::orderBy('order', 'asc')->get()
        );
    }
}