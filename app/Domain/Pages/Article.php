<?php
// TODO: This is a work in progress. To finish, create a base class of "Post".
// Extend Article and Page with the base class.

// In tinker, test with:
// $post = Cms\Domain\Posts\Article::create(['title' => 'New Article', 'organization_id' => 1])

namespace Cms\Domain\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Cms\Domain\Posts\Post;

class Article extends Post
{
    public static function boot()
    {
        parent::boot();

        // When this model is first created
        // Add the 'Cms\Domain\Pages\Article' type
        static::creating(function (Model $model) {
            // $model->type = self::class;
            $model->type = 'Cms\Domain\Posts\Article';
        });
    }

    public static function booted()
    {
        // Add 'Cms\Domain\Pages\PageBlueprint' scope to this model
        // This gives us single table inheritence
        static::addGlobalScope('article', function(Builder $builder) {
            // $builder->where('type', self::class);
            $builder->where('type', 'Cms\Domain\Posts\Article');
        });
    }
}
