<?php

namespace Cms\Domain\Rates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RateTableGroup extends Model
{
    use HasFactory;

    public function rate_tables() {
        return $this->hasMany('Cms\Domain\Rates\RateTable');
    }
}
