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

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function layout()
    {
        return $this->belongsTo('App\Models\Layout');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new PageFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
