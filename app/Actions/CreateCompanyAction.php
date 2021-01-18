<?php

namespace App\Actions;

use App\Models\Company;
use Illuminate\Support\Str;

class CreateCompanyAction
{
    public function execute(array $data)
    {
        $company = new Company;
        $company->name = $data['name'];
        $company->uuid = (string) Str::uuid();
        $company->save();

        $company->update([
            'database' => 'cms_' . $company->id
        ]);

        return $company;
    }
}
