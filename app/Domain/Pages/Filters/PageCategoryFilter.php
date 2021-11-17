<?php

namespace Cms\Domain\Pages\Filters;

use Illuminate\Database\Eloquent\Builder;

use Cms\App\Filters\FilterAbstract;

class PageCategoryFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        // Find the category and it's descendants as array of id's
        // $categories = Category::descendantsAndSelf($value)->pluck('id');

        // Return builder
        // return $builder->whereIn('category_id', $categories);
        return $builder->where('category_id', '=', $value);
    }

}
