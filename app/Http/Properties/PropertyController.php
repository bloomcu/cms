<?php

namespace Cms\Http\Properties;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Properties\Property;
use Cms\Domain\Organizations\Organization;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Organization $organization)
    {
        return $organization->properties;
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Organization $organization, Request $request)
    {
        $property = $organization->properties()->create([
            'title' => $request['title']
        ]);

        return $property;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Organization $organization, Property $property)
    {
        return $property;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Organization $organization, Property $property, Request $request)
    {
        $property->update(
            $request->all()
        );

        return $property;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Organization $organization, Property $property)
    {
        $property->delete();
        
        return $property;
    }
}
