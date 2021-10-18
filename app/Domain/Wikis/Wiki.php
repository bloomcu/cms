<?php

namespace Cms\Domain\Wikis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
