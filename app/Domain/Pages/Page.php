<?php

namespace Cms\Domain\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Traits
use Cms\App\Traits\IsBlueprint;

// Filters
use Cms\Domain\Pages\Filters\PageFilters;

class Page extends Model
{
    use HasFactory, IsBlueprint;

    protected $guarded = ['id'];

    protected $table = 'pages';

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    public function layouts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout');
    }

    public function layout()
    {
        return $this->hasOne('Cms\Domain\Layouts\Layout')->latest();
    }

    public function category()
    {
        return $this->belongsTo('Cms\Domain\Categories\Category');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PageFilters($request))
            ->add($filters)
            ->filter($builder);
    }

}
