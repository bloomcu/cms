<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Layout;
use App\Models\Block;
// use App\Http\Requests\LayoutStoreRequest;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return Layout::filter($request)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
     public function store(Request $request)
     {
         $layout = Layout::create(
             // $request->validated()
             $request->all()
         );

         return $layout;
     }

    /**
     * Display the specified resource.
     *
     */
    public function show(Layout $layout)
    {
        return $layout
            ->load('blocks');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Layout $layout, Request $request)
    {
        $layout->update(
            $request->all()
        );

        if ($request['blocks']) {
            foreach($request['blocks'] as $index => $block) {

                $storedBlock = Block::firstWhere('uuid', $block['uuid']);

                $storedBlock->update([
                    'content' => $block['content'],
                    'order' => $index
                ]);
            }
        }

        return $layout;
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Layout $layout)
    {
        $layout->delete();

        return $layout;
    }
}
