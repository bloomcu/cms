<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }
}
