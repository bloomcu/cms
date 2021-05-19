<?php

namespace App\Actions;

use App\Models\Company;
use Illuminate\Support\Str;

class CreateCompanyAction
{
    public function execute(array $data)
    {
        $company = Company::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'uuid' => (string) Str::uuid(),
            'database' => 'cms_' . $data['name']
        ]);
        return $company;
    }
}
