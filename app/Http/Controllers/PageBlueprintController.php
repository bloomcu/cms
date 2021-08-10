<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PageController;

use App\Models\Organization;
use App\Models\Page;
use App\Models\Block;

class PageBlueprintController extends PageController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Organization $organization, Request $request)
    {
        return Page::where('organization_id', $organization->id)
            ->where('is_blueprint', true)
            ->with('category:id,title')
            ->with('type:id,title')
            //TODO: After creating dedicated replicate controller
            //TODO: We don't need with('blocks')
            //TODO: Becauase it just takes the page id to be replicated
            //TODO: E.g., create(page_id, is_blueprint)
            ->with('blocks')
            ->filter($request)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

}
