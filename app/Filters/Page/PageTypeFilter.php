<?php

namespace App\Filters\Page;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class PageTypeFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        // Find the category and it's descendants as array of id's
        // $categories = Category::descendantsAndSelf($value)->pluck('id');

        // Return builder
        // return $builder->whereIn('type_id', $categories);
        return $builder->where('type_id', $value);
    }

}
