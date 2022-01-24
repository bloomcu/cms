<?php
// TODO: This is a work in progress. To finish, create a base class of "Post".
// Extend Article and Post with the base class.

// In tinker, test with:
// $post = Cms\Domain\Posts\Article::create(['title' => 'New Article', 'organization_id' => 1])

namespace Cms\Domain\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Parental\HasParent;

// Domains
use Cms\Domain\Posts\Post;

class Article extends Post
{
    Use HasParent;

    // public static function boot()
    // {
    //     parent::boot();
    //
    //     // When this model is first created
    //     // Add the 'Cms\Domain\Posts\Article' type
    //     static::creating(function (Model $model) {
    //         $model->type = self::class;
    //         // $model->type = 'Cms\Domain\Posts\Article';
    //     });
    // }

    public static function booted()
    {
        static::addGlobalScope('article', function(Builder $builder) {
            $builder->whereType(self::class);
        });
    }
}
