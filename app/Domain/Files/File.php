<?php

namespace Cms\Domain\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

// use Cms\Domain\Files\Filters\FileFilters;

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
    //     return $this->belongsTo('Cms\Domain\Organizations\Organization');
    // }

    // public function user()
    // {
    //     return $this->belongsTo('Cms\Domain\Users\User');
    // }

    // public function scopeFilter(Builder $builder, $request, array $filters = [])
    // {
    //     return (new FileFilters($request))
    //         ->add($filters)
    //         ->filter($builder);
    // }
}
