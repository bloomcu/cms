<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'json'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public function blocks()
    {
        return $this->belongsTo('App\Models\Block');
    }

}
