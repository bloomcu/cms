<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Traits\HasUuid;

class Block extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'json'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    // public function baseBlock()
    // {
    //     return $this->belongsTo('App\Models\BaseBlock');
    // }

    // public function layout()
    // {
    //     return $this->belongsTo('App\Models\Layout');
    // }

    // public function contents()
    // {
    //     return $this->hasMany('App\Models\Content');
    // }
}
