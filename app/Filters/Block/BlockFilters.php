<?php

namespace App\Filters\Block;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Filters\FiltersAbstract;
use App\Filters\Block\BlockCategoryFilter;

class BlockFilters extends FiltersAbstract
{

    // Filters we want to apply to builder
    protected $filters = [
        'category' => BlockCategoryFilter::class
    ];

}
