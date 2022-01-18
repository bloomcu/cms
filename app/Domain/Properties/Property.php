<?php

namespace Cms\Domain\Properties;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Cms\App\Traits\HasUuid;
use Cms\App\Traits\HasSlug;

class Property extends Model
{
    use HasFactory, 
        HasUuid, 
        HasSlug;

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
     * Get the organization this property belongs to.
     *
     * @return hasMany
     */
    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    /**
     * Get the pages associated with this property.
     *
     * @return hasMany
     */
    public function pages()
    {
        return $this->hasMany('Cms\Domain\Pages\Page');
    }

    /**
     * Get the pages associated with this property.
     *
     * @return hasMany
     */
    public function layouts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout');
    }

    /**
     * Get the files associated with this property.
     *
     * @return hasMany
     */
    public function files()
    {
        return $this->hasMany('Cms\Domain\Files\File');
    }

    /**
     * Get the menus associated with this property.
     *
     * @return hasMany
     */
    public function menus()
    {
        return $this->hasMany('Cms\Domain\Menus\Menu');
    }
    
    /**
     * Get the menu with location 'header' associated with this property.
     *
     * @return hasOne
     */
    public function globalHeader()
    {
        return $this->hasOne('Cms\Domain\Menus\Menu')->location('header');
    }
    
    /**
     * Get the menu with location 'footer' associated this the property.
     *
     * @return hasOne
     */
    public function globalFooter()
    {
        return $this->hasOne('Cms\Domain\Menus\Menu')->location('footer');
    }
}
