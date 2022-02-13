<?php

namespace Cms\Domain\Layouts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// Traits
use Cms\App\Traits\IsDraftable;

class Layout extends Model
{
    use HasFactory,
        IsDraftable;

    protected $guarded = ['id'];

    protected $dates = ['drafted_at'];

    public function property()
    {
        return $this->belongsTo('Cms\Domain\Properties\Property');
    }
    
    // TODO: Associate with a user
    // /**
    //  * Get the user who owns this layout.
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

    public function blocks()
    {
        return $this->hasMany('Cms\Domain\Blocks\Block')->orderBy('order');
    }
}
