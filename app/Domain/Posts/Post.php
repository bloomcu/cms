<?php

namespace Cms\Domain\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Parental\HasChildren;

// Traits
use Cms\App\Traits\HasSlug;
use Cms\App\Traits\HasUrl;
use Cms\App\Traits\IsBlueprint;

// Filters
use Cms\Domain\Posts\Filters\PostFilters;

class Post extends Model
{
    use HasFactory,
        HasChildren,
        HasSlug,
        HasUrl,
        IsBlueprint;

    protected $guarded = ['id', 'url'];

    protected $childTypes = [
        'article' => Article::class
    ];

    public static function booted()
    {
        static::addGlobalScope('post', function(Builder $builder) {
            $builder->where('type', null);
        });
    }

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

    public function category()
    {
        return $this->belongsTo('Cms\Domain\Categories\Category');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PostFilters($request))
            ->add($filters)
            ->filter($builder);
    }

}
