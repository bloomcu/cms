<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function items()
    {
        // return $this->hasMany('Cms\Domain\Menus\MenuItem')->isParent();
        return $this->hasMany('Cms\Domain\Menus\MenuItem');
    }
}
