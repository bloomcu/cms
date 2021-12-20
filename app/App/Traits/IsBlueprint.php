<?php

namespace Cms\App\Traits;

trait IsBlueprint {

    public function scopeWithoutBlueprints($query)
    {
        return $query->where('is_blueprint', '=', 0);
    }

    public function scopeOnlyBlueprints($query)
    {
        $query->where('is_blueprint', '=', 1);
    }
}
