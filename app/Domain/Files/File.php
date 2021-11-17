<?php

namespace Cms\Domain\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

use Cms\App\Traits\HasUuid;
// use Cms\Domain\Files\Filters\FileFilters;

class File extends Model
{
    use HasFactory, hasUuid;

    // public static function booted()
    // {
    //     static::creating(function ($file) {
    //         $file->uuid = Str::uuid();
    //     });
    // }

    protected $guarded = [
        'id'
    ];

    /**
     * Get the organization associated with the file.
     *
     * @return BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo('Cms\Domain\Organizations\Organization');
    }

    /**
     * Get the user associated with the file.
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
