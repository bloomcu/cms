<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Domains
use Cms\Domain\Menus\MenuItem;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    public function items()
    {
        return $this->hasMany('Cms\Domain\Menus\MenuItem');
    }

    public function itemsTree()
    {
        return MenuItem::where('menu_id', $this->id)
            ->tree()
            ->get()
            ->toTree();
    }
}
