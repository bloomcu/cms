<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Vendors
use Kalnoy\Nestedset\NodeTrait;

// Cast
use Cms\Domain\Menus\Casts\MenuItemData;

class Menu extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = ['id'];
    
    protected $casts = [
        'data' => MenuItemData::class
    ];

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

    public function children()
    {
        return $this->hasMany('Cms\Domain\Menus\Menu', 'parent_id');
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
    
    /**
     * Get a menu by it's 'location' column
     *
     */
    public function scopeLocation($query, $value)
    {
        return $query->where('location', $value);
    }
}
