<?php

namespace Cms\Domain\Pages\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Cms\App\Filters\FiltersAbstract;
use Cms\Domain\Pages\Filters\PageBlueprintFilter;
use Cms\Domain\Pages\Filters\PageCategoryFilter;
use Cms\Domain\Pages\Filters\PageTypeFilter;

class PageFilters extends FiltersAbstract
{

    // Filters we want to apply to builder
    protected $filters = [
        'is_blueprint' => PageBlueprintFilter::class,
        'category' => PageCategoryFilter::class,
        'type' => PageTypeFilter::class,
    ];

}
