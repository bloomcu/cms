<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Files\File;

class Image extends DataTransferObject
{       
    public ?int $file_id = null;
    public ?string $name = '';
    public ?string $src = '';
    public ?string $alt = '';
    
    public static function get(?array $image)
    {
        if ($image) {
            $file = File::find($image['file_id']);
            
            if ($file) {
                return new static(
                    file_id:   $file->id,
                    name: $file->name,
                    src:  $file->src,
                );
            }
            
            return new static;
        }
        
        return new static;
    }

    // public static function set(array $value)
    // {
    //     // dd($value['id']);
    //     $data = [
    //         'id' => $value['id'] ?? null
    //     ];
    // 
    //     return $data;
    // }
}
