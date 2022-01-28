<?php

namespace Cms\Domain\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Parental\HasParent;

// Domains
use Cms\Domain\Posts\Post;

class Page extends Post
{
    Use HasParent;
    
    public static function booted()
    {
        static::addGlobalScope('page', function(Builder $builder) {
            $builder->whereType(self::class);
        });
    }
}
