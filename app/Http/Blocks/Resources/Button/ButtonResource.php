<?php

namespace Cms\Http\Blocks\Resources\Button;

use Illuminate\Http\Resources\Json\JsonResource;

class ButtonResource extends JsonResource
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
            'text' => isset($this['text']) ? $this['text'] : '',
            'href' => isset($this['href']) ? $this['href'] : '',
        ];
    }
}
