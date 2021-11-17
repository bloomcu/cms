<?php

namespace Cms\Domain\Layouts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Cms\Domain\Layouts\Filters\LayoutFilters;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    public function page()
    {
        return $this->belongsTo('Cms\Domain\Pages\Page');
    }

    public function category()
    {
        return $this->belongsTo('Cms\Domain\Categories\Category');
    }

    public function framework()
    {
        return $this->belongsTo('Cms\Domain\Frameworks\Framework');
    }

    public function blocks()
    {
        return $this->hasMany('Cms\Domain\Blocks\Block')->orderBy('order');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new LayoutFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
