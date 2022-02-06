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
            'src'   => isset($this['src']) ? $this['src'] : 'files/fda5adba21b49f939754d6db5eb1961a.jpg', // string
            'alt'   => isset($this['alt']) ? $this['alt'] : '', // string
            'class' => isset($this['class']) ? $this['class'] : '', // string
            'title' => isset($this['title']) ? $this['title'] : '', // string
            'href'  => isset($this['alt']) ? $this['href'] : '', // string
        ];
    }
}
