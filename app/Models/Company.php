<?php

namespace App\Models;

use App\Tenant\Models\Tenant;
use App\Tenant\Traits\IsTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model implements Tenant
{
    use HasFactory, IsTenant;

    protected $guarded = [
        'id'
    ];
}
