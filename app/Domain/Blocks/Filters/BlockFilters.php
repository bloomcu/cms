<?php

namespace Cms\Domain\Blocks\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Cms\App\Filters\FiltersAbstract;
use Cms\Domain\Blocks\Filters\BlockCategoryFilter;

class BlockFilters extends FiltersAbstract
{

    // Filters to be applied to model
    protected $filters = [
        'category' => BlockCategoryFilter::class
    ];

}
