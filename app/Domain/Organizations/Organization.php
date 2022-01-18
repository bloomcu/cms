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

    protected $guarded = ['id'];

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
     * Get the properties associated with this organization.
     *
     * @return hasMany
     */
    public function properties()
    {
        return $this->hasMany('Cms\Domain\Properties\Property');
    }
}
