<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Traits\HasUuid;

class LayoutBlocks extends Pivot
{
    use HasUuid;

    protected $table = 'layout_blocks';
}
