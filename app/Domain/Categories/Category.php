<?php

namespace Cms\Domain\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory, HasRecursiveRelationships;

    protected $guarded = ['id'];

    // public function children()
    // {
    //     return $this->hasMany('Cms\Domain\Categories\Category', 'parent_id');
    // }

    public function pages()
    {
        return $this->hasMany('Cms\Domain\Pages\Page');
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
