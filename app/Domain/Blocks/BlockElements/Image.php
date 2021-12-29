<?php

namespace Cms\Domain\Blocks\BlockElements;

use Cms\Domain\Files\File;

class Image
{
    public static function get($value)
    {
        $file = File::find($value);

        return [
            'path' => $file->path
        ];
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
