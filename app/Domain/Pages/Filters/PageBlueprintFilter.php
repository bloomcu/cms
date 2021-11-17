<?php

namespace Cms\Domain\Pages\Filters;

use Illuminate\Database\Eloquent\Builder;

use Cms\App\Filters\FilterAbstract;

class PageBlueprintFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        return $builder->where('is_blueprint', '=', $value);
    }

}
