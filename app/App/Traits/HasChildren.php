<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasChildren {

    /**
     * Get only parent (top level) resources.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeParents(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }
}
