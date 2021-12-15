<?php

namespace Cms\Http\Menus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Menus\Resources\MenuItemResource;

class MenuResource extends JsonResource
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
            'items' => new MenuItemCollection($this->whenLoaded('items'))
        ];
    }
}