<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Filters\Page\PageFilters;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $casts = ['is_blueprint' => 'boolean'];

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function framework()
    {
        return $this->belongsTo('App\Models\Framework');
    }

    public function wiki()
    {
        return $this->belongsTo('App\Models\Wiki');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\Block')
            ->orderBy('order');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PageFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
