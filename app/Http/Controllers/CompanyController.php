<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Actions\CreateCompanyAction;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request, CreateCompanyAction $createCompanyAction)
    {
        // $company = $action->execute($request->all());
        $company = $createCompanyAction->execute(
            ['name' => 'BloomCU']
        );
        return $company;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
    }
}
