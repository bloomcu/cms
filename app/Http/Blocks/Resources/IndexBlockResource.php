<?php

namespace Cms\Http\Blocks\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Categories\Resources\CategoryResource;

class IndexBlockResource extends JsonResource
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
            'uuid' => $this->uuid,
            'title' => $this->title,
            'component' => $this->component,
            'is_blueprint' => $this->is_blueprint,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'group' => $this->group,
            'data' => $this->data,
        ];
    }
}
