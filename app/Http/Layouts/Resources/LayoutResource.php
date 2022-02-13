<?php

namespace Cms\Http\Layouts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Layouts\Resources\LayoutCollection;
use Cms\Http\Blocks\Resources\ShowBlockResource;

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
            'drafted_at' => $this->drafted_at,
            'published_at' => $this->published_at,
            'blocks' => ShowBlockResource::collection($this->whenLoaded('blocks')),
            'draft' => new LayoutResource($this->whenLoaded('draft')),
        ];
    }
}
