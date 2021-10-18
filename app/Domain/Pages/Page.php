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

    // protected $casts = ['is_blueprint' => 'boolean'];

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    public function framework()
    {
        return $this->belongsTo('Cms\Domain\Frameworks\Framework');
    }

    public function wiki()
    {
        return $this->belongsTo('Cms\Domain\Wikis\Wiki');
    }

    public function category()
    {
        return $this->belongsTo('Cms\Domain\Categories\Category');
    }

    // public function type()
    // {
    //     return $this->belongsTo('Cms\Domain\Categories\Category');
    // }

    public function blocks()
    {
        return $this->hasMany('Cms\Domain\Blocks\Block')
            ->orderBy('order');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PageFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
