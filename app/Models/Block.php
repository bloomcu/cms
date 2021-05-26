<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Block\BlockFilters;

class Block extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function layouts()
    {
        return $this->belongsToMany('App\Models\Layout', 'layout_blocks');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new BlockFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
