<?php

namespace Cms\Domain\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cms\Domain\Table\TableGroup;

class Table extends Model
{
    use HasFactory;

    public $name;
    public $data;
    public $orgnization_ud;
    
    protected $fillable = [
        'name',
        'data',
        'organization_id'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function table_groups() {
        return $this->belongsToMany(TableGroup::class);
    }
}
