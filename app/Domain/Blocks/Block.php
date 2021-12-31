<?php

namespace Cms\Domain\Blocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

use Cms\Domain\Blocks\Filters\BlockFilters;
use Cms\App\Traits\HasUuid;

use Cms\Domain\Blocks\Casts\BlockData;

/**
 * [Block description]
 */
class Block extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'data' => 'json'
    ];

    // protected $casts = [
    //     'data' => BlockData::class
    // ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // public function organization()
    // {
    //     return $this->belongsTo('Cms\Domain\Organizations\Organization');
    // }

    public function layout()
    {
        return $this->belongsTo('Cms\Domain\Layouts\Layout');
    }

    public function dataClass()
    {
        // TODO: Rename 'component' attribute to 'block'
        return 'Cms\\Domain\\Blocks\\BlockData\\' . Str::studly($this['component']);
    }

    /**
     * Apply filters.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new BlockFilters($request))
            ->add($filters)
            ->filter($builder);
    }

    // /**
    //  * Get only base blocks.
    //  *
    //  * @return \Illuminate\Database\Query\Builder
    //  */
    // public function scopeBase(Builder $builder)
    // {
    //     $builder->whereNull('layout_id')->whereType('base');
    // }
}
