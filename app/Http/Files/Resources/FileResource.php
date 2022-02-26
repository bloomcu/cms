<?php

namespace Cms\Http\Files\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'src' => $this->src,

            // TODO: Make a "Size" value object class for this.
            'size' => round($this->size / 125000, 2) . ' MB'
        ];
    }
}
