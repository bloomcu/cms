<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Layout\LayoutFilters;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pages()
    {
        return $this->hasMany('App\Models\Pages');
    }

    public function blocks()
    {
        return $this->belongsToMany('App\Models\Block', 'layout_blocks')
            ->using('App\Models\LayoutBlocks')
            ->withPivot('id')
            ->orderBy('order');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new LayoutFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
