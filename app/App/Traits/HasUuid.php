<?php

namespace Cms\App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    protected static function bootHasUuid()
    {

        static::creating(function ($model) {
            // $model->uuid = Str::uuid();

            if (!$model->uuid) {
                $model->uuid = Str::uuid();
            }
        });

        // static::creating(function ($model) {
        //     if (! $model->getKey()) {
        //         $model->{$model->getKeyName()} = (string) Str::uuid();
        //     }
        // });
    }

    // public function getIncrementing()
    // {
    //     return false;
    // }
    //
    // public function getKeyType()
    // {
    //     return 'string';
    // }
}
