<?php

namespace App\Tenant\Traits;

use App\Models\TenantConnection;
use App\Tenant\Models\Tenant;
use Illuminate\Support\Str;

trait IsTenant
{
    public static function boot()
    {
        parent::boot();

        // While a new company is being created
        static::creating(function($tenant) {
            $tenant->uuid = (string) Str::uuid();
        });

        // When a new company is created
        // Pass that tenant (company) into
        // newDatabaseConnection static function
        static::created(function($tenant) {
            $tenant->tenantConnection()->save(static::newDatabaseConnection($tenant));
        });
    }

    protected static function newDatabaseConnection(Tenant $tenant)
    {
        // Create a new tenant connection record in database
        return new TenantConnection([
            'database' => 'cms_' . $tenant->id,
            // 'host' => 'aws'
        ]);
    }

    public function tenantConnection()
    {
        // Tenant connect relationship
        return $this->hasOne(TenantConnection::class, 'company_id', 'id');
    }
}
