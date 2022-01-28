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

    public function property()
    {
        return $this->belongsTo('Cms\Domain\Properties\Property');
    }
    
    // TODO: Associate with a user
    // /**
    //  * Get the user who owns this menu.
    //  *
    //  * @return BelongsTo
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('Cms\Domain\Users\User');
    // }

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

    public function scopeLocation($query, $value)
    {
        return $query->where('location', $value);
    }
}
