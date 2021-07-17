<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Framework;

class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        // return Framework::filter($request)
        //     ->get();

        return Framework::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
     public function store(Request $request)
     {
         $framework = Framework::create(
             $request->all()
         );

         return $framework;
     }

    /**
     * Display the specified resource.
     *
     */
    public function show(Framework $framework)
    {
        return $framework;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Framework $framework, Request $request)
    {
        $framework->update(
            $request->all()
        );

        return $framework;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Framework $framework)
    {
        $framework->delete();

        return $framework;
    }
}
