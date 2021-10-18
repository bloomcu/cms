<?php

namespace Cms\Domain\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany('Cms\Domain\Categories\Category', 'parent_id');
    }

    public function pages()
    {
        return $this->hasMany('Cms\Domain\Pages\Page');
    }
}
