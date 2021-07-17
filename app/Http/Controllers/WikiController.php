<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wiki;

class WikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        // return Wiki::filter($request)
        //     ->get();

        return Wiki::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
     public function store(Request $request)
     {
         $wiki = Wiki::create(
             $request->all()
         );

         return $wiki;
     }

    /**
     * Display the specified resource.
     *
     */
    public function show(Wiki $wiki)
    {
        return $wiki;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Wiki $wiki, Request $request)
    {
        $wiki->update(
            $request->all()
        );

        return $wiki;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Wiki $wiki)
    {
        $wiki->delete();

        return $wiki;
    }
}
