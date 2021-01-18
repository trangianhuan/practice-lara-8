<?php

namespace App\Libraries\Engines;

use Laravel\Scout\Builder;
use Laravel\Scout\Engines\Engine;

class ElasticsearchEngine extends Engine
{

    function __construct(argument)
    {
        abstract public function update($models);
        abstract public function delete($models);
        abstract public function search(Builder $builder);
        abstract public function paginate(Builder $builder, $perPage, $page);
        abstract public function mapIds($results);
        abstract public function map(Builder $builder, $results, $model);
        abstract public function getTotalCount($results);
        abstract public function flush($model);
    }

}
