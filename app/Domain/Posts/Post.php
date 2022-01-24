<?php

namespace Cms\Domain\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Parental\HasChildren;

// Domains
use Cms\Domain\Pages\Page;
use Cms\Domain\Articles\Article;

// Traits
use Cms\App\Traits\HasSlug;
use Cms\App\Traits\HasUrl;
use Cms\App\Traits\IsBlueprint;
use Cms\App\Traits\IsCategorizable;

// Filters
use Cms\Domain\Posts\Filters\PostFilters;

class Post extends Model
{
    use HasFactory,
        HasChildren,
        HasSlug,
        HasUrl,
        IsBlueprint,
        IsCategorizable;

    protected $guarded = ['id', 'url'];

    protected $childTypes = [
        'page' => Page::class,
        'article' => Article::class
    ];

    public function property()
    {
        return $this->belongsTo('Cms\Domain\Properties\Property');
    }
    
    // TODO: Associate with a user
    // /**
    //  * Get the user who owns this post.
    //  *
    //  * @return BelongsTo
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('Cms\Domain\Users\User');
    // }

    public function layout()
    {
        return $this->hasOne('Cms\Domain\Layouts\Layout')->latestOfMany();
    }

    public function layouts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PostFilters($request))
            ->add($filters)
            ->filter($builder);
    }

}
