<?php

namespace App\Http\Controllers;

use App\Actions\CreateCompanyAction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function store(Request $request, CreateCompanyAction $action)
    {
        // $company = $action->execute($request->all());
        $company = $action->execute(['name' => 'BloomCU']);
        return $company;
    }
}
