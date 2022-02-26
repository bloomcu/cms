<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Files\File;

class Image extends DataTransferObject
{       
    public ?int $id = null;
    public ?string $name = '';
    public ?string $src = '';
    public ?string $alt = '';
    
    public static function get(?int $id)
    {
        if ($id) {
            $file = File::find($id);

            return new static(
                id:    $file->id,
                name:  $file->name,
                src:   $file->src,
            );
        } else {
            return new static;
        }
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
