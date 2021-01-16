<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function layout()
    {
        return $this->belongsTo('App\Models\Layout');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }
}
