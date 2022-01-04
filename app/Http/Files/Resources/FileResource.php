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
            'uuid' => $this->uuid,
            'type' => $this->type,
            'name' => $this->name,
            'path' => $this->path,

            // TODO: Make a "Size" value object class for this.
            'size' => round($this->size / 125000, 2) . ' MB'
        ];
    }
}
