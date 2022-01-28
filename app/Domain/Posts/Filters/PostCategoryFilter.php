<?php

namespace Cms\Domain\Posts\Filters;

use Illuminate\Database\Eloquent\Builder;

use Cms\App\Filters\FilterAbstract;

class PostCategoryFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        // Find the category and it's descendants as array of id's
        // $categories = Category::descendantsAndSelf($value)->pluck('id');

        return $builder->where('category_id', '=', $value);
    }

}
