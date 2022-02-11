<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait IsBlueprint {
    
    // protected static function bootIsBlueprint(): void
    // {
    //     static::addGlobalScope('blueprint', function(Builder $builder) {
    //         $builder->where('is_blueprint', false);
    //     });
    // }

    public function scopeWithoutBlueprints($query)
    {
        return $query->where('is_blueprint', '=', 0);
    }

    public function scopeOnlyBlueprints($query)
    {
        $query->where('is_blueprint', '=', 1);
    }
}
