<?php

namespace Cms\App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    protected static function bootHasUuid()
    {

        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = Str::uuid();
            }
        });
    }
}
