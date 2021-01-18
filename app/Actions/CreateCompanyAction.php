<?php

namespace App\Actions;

use App\Models\Company;
use Illuminate\Support\Str;

class CreateCompanyAction
{
    public function execute(array $data)
    {
        $company = Company::make([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'uuid' => (string) Str::uuid()
        ]);

        // $request->user()->companies()->save($company);
        $company->save();

        $company->update([
            'database' => 'cms_' . $company->id
        ]);

        return $company;
    }
}
