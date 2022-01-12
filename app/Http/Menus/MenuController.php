<?php

namespace Cms\Http\Menus;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Menus\Menu;
use Cms\Domain\Organizations\Organization;

// Resources
use Cms\Http\Menus\Resources\MenuResource;

// Requests
// use Cms\Http\Menus\Requests\MenuStoreRequest;
// use Cms\Http\Menus\Requests\MenuUpdateRequest;

class MenuController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $menus = $organization->menus()
            ->latest()
            ->get();

        return MenuResource::collection($menus);
    }

    public function store(Organization $organization, Request $request)
    {
        $menu = $organization->menus()->create(
            // $request->validated()
            $request->all()
        );

        return new MenuResource($menu);
    }

    public function show(Organization $organization, Menu $menu)
    {
        return new MenuResource(
            $menu->load(['items'])
        );
    }

    public function update(Organization $organization, Menu $menu, Request $request)
    {
        $menu->update(
            // $request->validated()
            $request->all()
        );

        return new MenuResource($menu);
    }

    public function destroy(Organization $organization, Menu $menu)
    {
        $menu->delete();

        return new MenuResource($menu);
    }
}
