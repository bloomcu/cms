<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Filters\Block\BlockFilters;

class BaseBlock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'json'];

    // public function getRouteKeyName()
    // {
    //     return 'component';
    // }

    // public function blocks()
    // {
    //     return $this->hasMany('App\Models\Block');
    // }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new BlockFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
