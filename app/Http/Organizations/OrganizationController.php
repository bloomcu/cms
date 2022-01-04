<?php

namespace Cms\Http\Organizations;

use Illuminate\Http\Request;

use Cms\App\Controllers\Controller;
use Cms\Domain\Organizations\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Organization::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $organization = Organization::create([
            'title' => $request['title']
        ]);

        // TODO: Use an API Resource to return this
        return $organization;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Organization $organization)
    {
        // TODO: Use an API Resource to return this
        return $organization;
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
