<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Vendors
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class MenuItem extends Model
{
    use HasFactory,
        HasRecursiveRelationships;

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo('Cms\Domain\Menus\Menu');
    }
}
