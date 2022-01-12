<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Vendors
use Kalnoy\Nestedset\NodeTrait;

class MenuItem extends Model
{
    use HasFactory,
        NodeTrait;

    protected $guarded = ['id'];

    protected function getScopeAttributes()
    {
        return ['menu_id'];
    }

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
