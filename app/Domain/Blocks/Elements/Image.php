<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Files\File;

class Image extends DataTransferObject
{       
    public ?int $file_id = null;
    public ?string $src = '';
    public ?string $title = '';
    public ?string $alt = '';
    
    public static function get(int $file_id)
    {
        $file = File::find($file_id);

        return new static(
            file_id: $file->id,
            src:     $file->path,
            title:   $file->title,
            alt:     $file->alt,
        );
    }

    // public static function set(array $value)
    // {
    //     // dd($value['id']);
    //     $data = [
    //         'id' => $value['id'] ?? null
    //     ];
    //
    //     return json_encode($data, true);
    // }
}
