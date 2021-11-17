<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait IsOrderable {

    /**
     * Get resource in specified order.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOrdered(Builder $builder, $direction = 'asc')
    {
        $builder->orderBy('order', $direction);
    }
}
