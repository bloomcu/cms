<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
