<?php

namespace Cms\Http\Blocks\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'src'   => isset($this['src']) ? $this['src'] : 'files/1cd9f6c0d0966a8086978a85fb6a0a7e.jpg', // string
            'alt'   => isset($this['alt']) ? $this['alt'] : '', // string
            'class' => isset($this['class']) ? $this['class'] : '', // string
            'title' => isset($this['title']) ? $this['title'] : '', // string
            'href'  => isset($this['alt']) ? $this['href'] : '', // string
        ];
    }
}
