<?php

namespace Cms\Http\Menus;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Menus\Menu;

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

    public function index(Organization $organization, Property $property, Request $request)
    {
        $menus = $property->menus()
            ->latest()
            ->get();

        return IndexMenuResource::collection($menus);
    }

    public function store(Organization $organization, Property $property, MenuStoreRequest $request)
    {
        $menu = $property->menus()->create(
            $request->validated()
        );

        return new ShowMenuResource($menu);
    }

    public function show(Organization $organization, Property $property, Menu $menu)
    {
        return new ShowMenuResource($menu);
    }

    public function update(Organization $organization, Property $property, Menu $menu, MenuUpdateRequest $request)
    {
        $menu->update(
            $request->only([
                'title',
                'location',
                'component'
            ])
        );

        UpsertMenuItemsAction::execute(
            $request->only(['items'])
        );

        return new ShowMenuResource($menu);
    }

    public function destroy(Organization $organization, Property $property, Menu $menu)
    {
        $menu->delete();

        return new ShowMenuResource($menu);
    }
}
