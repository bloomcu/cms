<?php

namespace Cms\Http\Layouts;

use Illuminate\Http\Request;

use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Blocks\Block;

use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Layouts\Resources\LayoutResource;

// use App\Http\Requests\LayoutStoreRequest;

class LayoutController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $layouts = $organization->layouts()
            ->with('category')
            ->filter($request)
            ->latest()
            ->get();

        return new LayoutCollection($layouts);
    }

     public function store(Request $request)
     {
         $layout = Layout::create(
             // $request->validated()
             $request->all()
         );

         return new LayoutResource($layout);
     }

    public function show(Organization $organization, Layout $layout)
    {
        return new LayoutResource(
            $layout->load(['category', 'blocks'])
        );
    }

    public function update(Organization $organization, Layout $layout, Request $request)
    {
        $layout->update(
            $request->all()
        );

        // TODO: Try using Sync for this?
        // if ($request['blocks']) {
        //     foreach($request['blocks'] as $index => $block) {
        //
        //         $storedBlock = Block::firstWhere('uuid', $block['uuid']);
        //
        //         $storedBlock->update([
        //             'data' => $block['data'],
        //             'order' => $index
        //         ]);
        //     }
        // }

        return new LayoutResource(
            $layout->load(['category', 'blocks'])
        );
    }

    public function destroy(Organization $organization, Layout $layout)
    {
        $layout->delete();
    }
}
