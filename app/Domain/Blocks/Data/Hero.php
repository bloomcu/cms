<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Elements\Image;
use Cms\Domain\Blocks\Elements\Button;

class Hero extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'center'     => $value['center'] ?? false,
            'fullscreen' => $value['center'] ?? false,
            'label'      => $value['label'] ?? '',
            'title'      => $value['title'] ?? '',
            'subtitle'   => $value['subtitle'] ?? '',
            'image'      => isset($value['image']) ? Image::get($value['image']['file_id']) : new Image(),
            'buttons'    => isset($value['buttons']) ? Button::collection($value['buttons']) : [],
        ];
    }
    
    // 
    // public static function set(array $value)
    // {
    //     $data = [
    //         'center'     => $value['center'] ?? false,
    //         'fullscreen' => $value['fullscreen'] ?? false,
    //         'label'      => $value['label'] ?? '',
    //         'title'      => $value['title'] ?? '',
    //         'subtitle'   => $value['subtitle'] ?? '',
    //         'image'      => $value['image'] ?? [],
    //         'buttons'    => $value['buttons'] ?? [],
    //     ];
    // 
    //     return json_encode($data, true);
    // }
}
