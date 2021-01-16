<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pages()
    {
        return $this->hasMany('App\Models\Pages');
    }

    public function blocks()
    {
        return $this->belongsToMany('App\Models\Block');
    }
}
