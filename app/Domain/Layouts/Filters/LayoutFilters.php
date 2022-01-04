<?php

namespace Cms\Domain\Layouts\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Cms\App\Filters\FiltersAbstract;
use Cms\Domain\Layouts\Filters\LayoutCategoryFilter;

class LayoutFilters extends FiltersAbstract
{

    // Filters to be applied to model
    protected $filters = [
        'category' => LayoutCategoryFilter::class
    ];

}
