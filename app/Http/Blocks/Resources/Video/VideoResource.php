<?php

namespace Cms\Http\Blocks\Resources\Video;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'src'          => isset($this['src']) ? $this['src'] : 'https://player.vimeo.com/external/417260615.sd.mp4?s=dfae4a81398d89ed47def5d09b7730cb037f1692', // string
            'loop'         => isset($this['loop']) ? $this['loop'] : true, // boolean
            'autoplay'     => isset($this['autoplay']) ? $this['autoplay'] : true, // boolean
            'muted'        => isset($this['muted']) ? $this['muted'] : true, // boolean
            'plays_inline' => isset($this['plays_inline']) ? $this['plays_inline'] : true, // boolean
        ];
    }
}
