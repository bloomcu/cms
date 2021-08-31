<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Route key used to fetch resource
     *
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
