<?php

namespace Cms\Domain\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Cms\Domain\Pages\Filters\PageFilters;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    public function layouts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout');
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
