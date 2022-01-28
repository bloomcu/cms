<?php

namespace Cms\Http\Menus\Resources\Menu;

use Illuminate\Http\Resources\Json\JsonResource;

// Resources
use Cms\Http\Menus\Resources\MenuItemResource;

class ShowMenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'location' => $this->location,
            'component' => $this->component,
            'items' => MenuItemResource::collection($this->itemsTree()),
        ];
    }
}
