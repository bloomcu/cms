<?php

namespace App\Filters\Page;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class PageBlueprintFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        return $builder->where('is_blueprint', $value);
    }

}
