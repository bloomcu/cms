<?php

namespace Cms\Domain\Pages;

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
use Cms\Domain\Pages\Filters\PageFilters;

class Page extends Model
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
        static::addGlobalScope('page', function(Builder $builder) {
            $builder->where('type', null);
        });
    }

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

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
        return (new PageFilters($request))
            ->add($filters)
            ->filter($builder);
    }

}
