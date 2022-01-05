<?php

namespace Cms\Http\Pages;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Pages\Page;

// Requests
use Cms\Http\Pages\Requests\PageCheckSlugRequest;

class PageCheckSlugController extends Controller
{
    public function show(PageCheckSlugRequest $request)
    {
        $query = Page::where('slug', '=', $request->slug);

        return response()->json([
            'data' => [
                'unique' => !$query->exists(),

                // TODO: Maybe also return the page resource using slug if not unique
            ]
        ]);
    }
}
