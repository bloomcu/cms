<?php

namespace Cms\Domain\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Parental\HasParent;

// Domains
use Cms\Domain\Posts\Post;

class Article extends Post
{
    Use HasParent;

    public static function booted()
    {
        static::addGlobalScope('article', function(Builder $builder) {
            $builder->whereType(self::class);
        });
    }
}
