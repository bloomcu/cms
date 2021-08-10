<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

// use App\Filters\Page\PageFilters;

class File extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function ($file) {
            $file->uuid = Str::uuid();
        });
    }

    protected $guarded = ['id'];

    // public function organization()
    // {
    //     return $this->belongsTo('App\Models\Organization');
    // }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    // public function scopeFilter(Builder $builder, $request, array $filters = [])
    // {
    //     return (new PageFilters($request))
    //         ->add($filters)
    //         ->filter($builder);
    // }
}
