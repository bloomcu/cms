<?php

namespace Cms\Http\Menus;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Cms\App\Controllers\Controller;

use Cms\Domain\Menus\Menu;

use Cms\Http\Menus\Resources\MenuResource;

class MenuController extends Controller
{

    public function index(Request $request)
    {
        $menus = Menu::all();
        return MenuResource::collection($menus);
    }

    public function show(Menu $menu)
    {
        return new MenuResource(
            $menu->load(['items'])
        );

        // return new MenuResource(
        //     $menu->load([
        //         'items',
        //         'items.children'
        //     ])
        // );
    }
}
