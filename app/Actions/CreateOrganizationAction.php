<?php

namespace App\Actions;

use App\Models\Organization;
use Illuminate\Support\Str;

class CreateOrganizationAction
{
    public function execute(array $data)
    {
        $organization = Organization::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'uuid' => (string) Str::uuid(),
            'database' => 'cms_' . $data['name']
        ]);
        return $organization;
    }
}
