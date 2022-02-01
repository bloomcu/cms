<?php

namespace Cms\Domain\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cms\Domain\Table\Table;

class TableGroup extends Model
{
    use HasFactory;
    
    public $fillable = [
        'name'
    ];
    
    public function tables() {
        return $this->belongsToMany(Table::class);
    }
}
