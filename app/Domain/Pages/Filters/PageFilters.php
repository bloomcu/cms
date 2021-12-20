<?php

namespace Cms\Domain\Pages\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Cms\App\Filters\FiltersAbstract;
use Cms\Domain\Pages\Filters\PageCategoryFilter;

class PageFilters extends FiltersAbstract
{

    // Filters we want to apply to builder
    protected $filters = [
        'category' => PageCategoryFilter::class,
    ];

}
