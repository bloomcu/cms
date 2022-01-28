<?php

namespace Cms\Domain\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Vendors
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

// Traits
use Cms\App\Traits\HasUuid;

class MenuItem extends Model
{
    use HasFactory,
        HasRecursiveRelationships,
        HasUuid;

    // TODO: Use fillable instead of guarded on all models. It forces use to
    // allow specific properties, vs forgetting to guard sensitive properties
    // such as UUID. Also, document this practive within "Style Guide"

    protected $fillable = [
        'uuid',
        'title',
        'component',
        'menu_id',
        'parent_id',
        'order',
    ];

    public function menu()
    {
        return $this->belongsTo('Cms\Domain\Menus\Menu');
    }
}
