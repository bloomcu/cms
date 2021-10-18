<?php

namespace Cms\Domain\Blocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Cms\App\Traits\HasUuid;

class Block extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'json'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function page()
    {
        return $this->belongsTo('Cms\Domain\Pages\Page');
    }

    // public function baseBlock()
    // {
    //     return $this->belongsTo('Cms\Domain\Blocks\BaseBlock');
    // }

    // public function layout()
    // {
    //     return $this->belongsTo('Cms\Domain\Layouts\Layout');
    // }

    // public function contents()
    // {
    //     return $this->hasMany('Cms\Domain\Content\Content');
    // }
}
