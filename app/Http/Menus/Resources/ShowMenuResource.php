<?php

namespace Cms\Http\Menus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'children' => ShowMenuResource::collection($this->children),
        ];
    }
}
