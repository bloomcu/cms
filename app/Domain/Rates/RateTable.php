<?php

namespace Cms\Domain\Rates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateTable extends Model
{
    use HasFactory;

    public function rates() {
        return $this->hasMany('Cms\Domain\Rates\Rate');
    }

    public function rate_group() {
        return $this->belongsTo('Cms\Domain\Rates\RateTableGroup');
    }
}
