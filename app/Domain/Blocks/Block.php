<?php

namespace Cms\Domain\Blocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cms\App\Traits\HasUuid;

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
        'content' => 'json'
    ];

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
}
