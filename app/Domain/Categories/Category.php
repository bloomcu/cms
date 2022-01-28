<?php

namespace Cms\Domain\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany('Cms\Domain\Categories\Category', 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany('Cms\Domain\Posts\Post');
    }

    /**
     * Get only parent (top level) categories.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeParents(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }
}
