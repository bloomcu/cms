<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// use App\Filters\Page\PageFilters;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function scopeFilter(Builder $builder, $request, array $filters = [])
    // {
    //     return (new PageFilters($request))
    //         ->add($filters)
    //         ->filter($builder);
    // }
}
