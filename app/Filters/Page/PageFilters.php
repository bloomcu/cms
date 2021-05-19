<?php

namespace App\Filters\Page;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Filters\FiltersAbstract;
use App\Filters\Page\PageCategoryFilter;
use App\Filters\Page\PageTypeFilter;

class PageFilters extends FiltersAbstract
{

    // Filters we want to apply to builder
    protected $filters = [
        'category' => PageCategoryFilter::class,
        'type' => PageTypeFilter::class,
    ];

}
