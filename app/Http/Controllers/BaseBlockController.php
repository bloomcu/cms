<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BaseBlock;

class BaseBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return BaseBlock::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $baseBlock = BaseBlock::create(
            // $request->validated()
            $request->all()
        );

        return $baseBlock;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(BaseBlock $baseBlock)
    {
        return $baseBlock;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(BaseBlock $baseBlock, Request $request)
    {
        $baseBlock->update(
            // $request->validated()
            $request->all()
        );

        return $baseBlock;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(BaseBlock $baseBlock)
    {
        $baseBlock->delete();

        return $baseBlock;
    }
}
