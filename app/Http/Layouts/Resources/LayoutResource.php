<?php

namespace Cms\Http\Layouts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;
use Cms\Http\Blocks\Resources\BlockCollection;

class LayoutResource extends JsonResource
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
            'type' => $this->type,
            'page_id' => $this->page_id,
            'organization_id' => $this->organization_id,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'blocks' => new BlockCollection($this->whenLoaded('blocks'))
        ];
    }
}
