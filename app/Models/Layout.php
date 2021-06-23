<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Filters\Layout\LayoutFilters;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\Block')
            ->orderBy('order');
    }

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new LayoutFilters($request))
            ->add($filters)
            ->filter($builder);
    }
}
