<?php

namespace Cms\Domain\Posts\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Cms\App\Filters\FiltersAbstract;
use Cms\Domain\Posts\Filters\PostCategoryFilter;

class PostFilters extends FiltersAbstract
{

    // Filters to be applied to model
    protected $filters = [
        'category' => PostCategoryFilter::class,
    ];

}
