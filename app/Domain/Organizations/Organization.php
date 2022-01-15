<?php

namespace Cms\Domain\Organizations;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Cms\App\Traits\HasUuid;
use Cms\App\Traits\HasSlug;

class Organization extends Model
{
    use HasFactory, HasUuid, HasSlug;

    protected $guarded = ['id', 'slug'];

    /**
     * Route key used to fetch resource
     *
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the users associated with the organization.
     * Organization belongs to many users via 'organization_user' table.
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Cms\Domain\Users\User');
    }

    /**
     * Get the pages associated with the organization.
     *
     * @return hasMany
     */
    public function pages()
    {
        return $this->hasMany('Cms\Domain\Pages\Page');
    }

    /**
     * Get the pages associated with the organization.
     *
     * @return hasMany
     */
    public function layouts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout');
    }

    /**
     * Get the files associated with the organization.
     *
     * @return hasMany
     */
    public function files()
    {
        return $this->hasMany('Cms\Domain\Files\File');
    }
    /**
     * Get the rate table groups associated with the organization
     *
     * @return hasMany
     */
    public function rate_table_groups() 
    {
        return $this->hasMany('Cms\Domain\Rates\RateTableGroups');
    }
}
