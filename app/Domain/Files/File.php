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

    protected $guarded = [
        'id'
    ];

    /**
     * Get the organization associated with the file.
     *
     * @return BelongsTo
     */
    public function property()
    {
        return $this->belongsTo('Cms\Domain\Properties\Property');
    }

    /**
     * Get the user who owns this file.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Cms\Domain\Users\User');
    }

    // public function scopeFilter(Builder $builder, $request, array $filters = [])
    // {
    //     return (new FileFilters($request))
    //         ->add($filters)
    //         ->filter($builder);
    // }
}
