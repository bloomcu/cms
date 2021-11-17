<?php

namespace Cms\App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasSlug {

    protected static function bootHasSlug()
    {
        
        static::creating(function (Model $model) {
            $model->slug = Str::slug($model->title);
        });

    }
}
