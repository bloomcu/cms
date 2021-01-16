<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function block()
    {
        return $this->belongsTo('App\Models\Block');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function scopeWherePost($query, $post_id)
    {
        return $query->where('post_id', $post_id)->first();
    }
}
