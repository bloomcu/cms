<?php

namespace Cms\Http\Blocks\Resources\Data;

use Illuminate\Http\Resources\Json\JsonResource;

use Cms\Http\Blocks\Resources\Image\ImageResource;

class TestimonialResource extends JsonResource
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
            'testimonial' => isset($this['testimonial']) ? $this['testimonial'] : 'The testimonial lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi atque doloremque beatae! Doloremque perspiciatis aliquid repellat quasi praesentium',
            'title'       => isset($this['title']) ? $this['title'] : 'The testimonial title',
            'subtitle'    => isset($this['title']) ? $this['title'] : 'The testimonial subtitle',
            'image'       => new ImageResource(isset($this['image']) ? $this['image'] : []),
        ];
    }
}
