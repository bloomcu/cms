<?php

namespace App\Filters\Page;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Filters\FilterAbstract;

class PageCategoryFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        // Find the category and it's descendants as array of id's
        $categories = Category::descendantsAndSelf($value)->pluck('id');

        // Return builder
        return $builder->whereIn('category_id', $categories);
    }

}
