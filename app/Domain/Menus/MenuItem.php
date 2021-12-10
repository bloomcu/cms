<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MenuItem extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo('Cms\Domain\Menus\Menu');
    }

    public function children()
    {
        return $this->hasMany('Cms\Domain\Menus\MenuItem', 'parent_id')->latest();
    }

    // public function link()
    // {
    //     return $this->belongsTo('Cms\Domain\Links\Link');
    // }

    // public function scopeIsParent($builder)
    // {
    //     return $builder->whereNull('parent_id');
    // }
}
