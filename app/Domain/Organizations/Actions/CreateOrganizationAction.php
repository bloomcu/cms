<?php

namespace Cms\Domain\Organizations\Actions;

use Illuminate\Support\Str;

use Cms\Domain\Organizations\Organization;

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
