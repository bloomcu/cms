<?php

namespace App\Filters\Layout;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Filters\FiltersAbstract;
use App\Filters\Layout\LayoutCategoryFilter;

class LayoutFilters extends FiltersAbstract
{

    // Filters we want to apply to builder
    protected $filters = [
        'category' => LayoutCategoryFilter::class
    ];

}
