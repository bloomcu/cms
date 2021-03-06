<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Files\File;

class Video extends DataTransferObject
{       
    public ?int    $file_id = null;
    public ?string $src = 'https://player.vimeo.com/external/417260615.sd.mp4?s=dfae4a81398d89ed47def5d09b7730cb037f1692';
    public ?bool   $loop = true;
    public ?bool   $autoplay = true;
    public ?bool   $muted = true;
    public ?bool   $plays_inline = true;
    
    public static function get(?array $video)
    {
        if ($video) {
            $file = File::find($video['file_id']);
            
            if ($file) {
                return new static(
                    file_id: $file->file_id,
                    src: $file->src,
                    loop: $file->loop,
                    autoplay: $file->autoplay,
                    muted: $file->muted,
                    plays_inline: $file->plays_inline,
                );
            }
            
            return new static;
        }
        
        return new static;
    }
}
