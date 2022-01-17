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

    // TODO: The following relationships should be scoped to a "site/project" domain
    // Files may belong to the organization so files can be accesses across sites/projects.

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
     * Get the menus associated with the organization.
     *
     * @return hasMany
     */
    public function menus()
    {
        return $this->hasMany('Cms\Domain\Menus\Menu');
    }

    public function globalHeader()
    {
        return $this->hasOne('Cms\Domain\Menus\Menu')->location('header');
    }

    public function globalFooter()
    {
        return $this->hasOne('Cms\Domain\Menus\Menu')->location('footer');
    }
}
