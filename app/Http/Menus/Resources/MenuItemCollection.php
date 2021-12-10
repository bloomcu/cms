<?php

namespace Cms\Http\Menus\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Cms\Http\Menus\Resources\MenuItemResource;

class MenuItemCollection extends ResourceCollection
{
    /**
     * Disable default "data" wrapper.
     *
     * @var string
     */
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return MenuItemResource::collection($this->collection);
    }
}
