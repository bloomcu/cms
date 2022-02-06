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
            'variant' => isset($this['variant']) ? $this['variant'] : 'primary', // string: primary, accent, subtle, disabled
            'text' => isset($this['text']) ? $this['text'] : 'Button', // string
            'size' => isset($this['size']) ? $this['size'] : '', // string: sm, md, lg
            'href' => isset($this['href']) ? $this['href'] : '', // string
            'trigger' => isset($this['trigger']) ? $this['trigger'] : '', // uuid
            'target' => isset($this['target']) ? $this['target'] : '', // string
        ];
    }
}
