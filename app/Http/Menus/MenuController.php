<?php

namespace Cms\Http\Menus;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Menus\Menu;

// Resources
use Cms\Http\Menus\Resources\MenuResource;

// Requests
use Cms\Http\Menus\Requests\MenuStoreRequest;
use Cms\Http\Menus\Requests\MenuUpdateRequest;

class MenuController extends Controller
{

    public function index(Organization $organization, Property $property)
    {
        $menus = $property->menus()
            ->parents()
            ->get();

        return MenuResource::collection($menus);
    }

    public function store(Organization $organization, Property $property, MenuStoreRequest $request)
    {
        $menu = $property->menus()->create(
            $request->validated()
        );

        return new MenuResource($menu);
    }

    public function show(Organization $organization, Property $property, Menu $menu)
    {
        $menu = Menu::defaultOrder()->descendantsAndSelf($menu->id)->toTree();
        
        return MenuResource::collection($menu);
    }

    public function update(Organization $organization, Property $property, Menu $menu, MenuUpdateRequest $request)
    {
        Menu::rebuildSubtree($menu, $request['children']);
        
        $menu = Menu::defaultOrder()
            ->descendantsAndSelf($menu->id)
            ->toTree();

        return MenuResource::collection($menu);
    }

    public function destroy(Organization $organization, Property $property, Menu $menu)
    {
        $menu->delete();
    }
}
