<?php

namespace Cms\Http\Menus;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Menus\Menu;
use Cms\Domain\Menus\MenuItem;
use Cms\Domain\Organizations\Organization;

// Resources
use Cms\Http\Menus\Resources\Menu\IndexMenuResource;
use Cms\Http\Menus\Resources\Menu\ShowMenuResource;

// Requests
use Cms\Http\Menus\Requests\MenuStoreRequest;
use Cms\Http\Menus\Requests\MenuUpdateRequest;

// Actions
use Cms\Domain\Menus\Actions\UpsertMenuItemsAction;

class MenuController extends Controller
{

    public function index(Organization $organization, Request $request)
    {
        $menus = $organization->menus()
            ->latest()
            ->get();

        return IndexMenuResource::collection($menus);
    }

    public function store(Organization $organization, MenuStoreRequest $request)
    {
        $menu = $organization->menus()->create(
            $request->validated()
        );

        return new ShowMenuResource($menu);
    }

    public function show(Organization $organization, Menu $menu)
    {
        return new ShowMenuResource($menu);
    }

    public function update(Organization $organization, Menu $menu, MenuUpdateRequest $request)
    {
        $menu->update(
            $request->except(['items'])
        );

        UpsertMenuItemsAction::execute(
            $request->only(['items'])
        );

        return new ShowMenuResource($menu);
    }

    public function destroy(Organization $organization, Menu $menu)
    {
        $menu->delete();

        return new ShowMenuResource($menu);
    }
}
