<?php

namespace Cms\Domain\Rates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    public function rate_table() {
        return $this->belongsTo('Cms\Domain\Rates\RateTable');
    }
}
