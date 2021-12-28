<?php

namespace Cms\Domain\Files;

use Cms\Domain\Files\File;

class Image extends File
{
    protected $table = 'files';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('type', '=', 'image');
        });
    }
}
