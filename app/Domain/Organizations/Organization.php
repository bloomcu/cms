<?php

namespace Cms\Domain\Organizations;

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
        return $this->hasMany('Cms\Domain\Users\User');
    }

    public function pages()
    {
        return $this->hasMany('Cms\Domain\Pages\Page');
    }

    public function files()
    {
        return $this->hasMany('Cms\Domain\Files\File');
    }
}
