<?php

namespace Cms\Domain\Blocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

// Traits
use Cms\App\Traits\HasUuid;
use Cms\App\Traits\IsBlueprint;
use Cms\App\Traits\IsCategorizable;

// Cast
use Cms\Domain\Blocks\Casts\BlockData;

class Block extends Model
{
    use HasFactory, 
        HasUuid,
        IsBlueprint,
        IsCategorizable;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        // 'data' => 'json'
        'data' => BlockData::class
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
    
    public function property()
    {
        return $this->belongsTo('Cms\Domain\Properties\Property');
    }
    
    // TODO: Associate with a user
    // /**
    //  * Get the user who owns this block.
    //  *
    //  * @return BelongsTo
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('Cms\Domain\Users\User');
    // }

    public function post()
    {
        return $this->belongsTo('Cms\Domain\Posts\Post');
    }
    
    public function dataClass()
    {
        // TODO: Rename 'component' attribute to 'block'
        return 'Cms\\Domain\\Blocks\\Data\\' . Str::studly($this['group']);
    }

}
