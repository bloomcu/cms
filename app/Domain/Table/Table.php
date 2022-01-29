<?php

namespace Cms\Domain\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $name;
    public $data;
    
    protected $fillable = [
        'name',
        'data'
    ];
    
    protected $casts = [
        'data' => 'array'
    ];
}
