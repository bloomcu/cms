<?php

namespace Cms\Http\Blocks\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;

// use Cms\App\Helpers\SetOrNull;

class ImageResource extends JsonResource
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
            'uuid' => isset($this['uuid']) ? $this['uuid'] : null,
            'src' => isset($this['path'])  ? $this['path'] : null,
            'name' => isset($this['name']) ? $this['name'] : null,

            // 'uuid' => setOrNull($this['uuid']),
            // 'src'  => setOrNull($this['path']),
            // 'name' => setOrNull($this['name']),
        ];
    }
}
