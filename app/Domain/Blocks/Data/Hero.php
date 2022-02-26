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
            'fullscreen' => $value['fullscreen'] ?? false,
            'label'      => $value['label'] ?? '',
            'title'      => $value['title'] ?? '',
            'subtitle'   => $value['subtitle'] ?? '',
            'image'      => isset($value['image']) ? Image::get($value['image']['id']) : new Image(),
            'buttons'    => isset($value['buttons']) ? Button::collection($value['buttons']) : [],
        ];
    }
    
    // public static function set(array $value)
    // {
    //     return [
    //         'center'     => $value['center'] ?? false,
    //         'fullscreen' => $value['fullscreen'] ?? false,
    //         'label'      => $value['label'] ?? '',
    //         'title'      => $value['title'] ?? '',
    //         'subtitle'   => $value['subtitle'] ?? '',
    //         'image'      => isset($value['image']) ? Image::set($value['image']['id']) : new Image(),
    //         'buttons'    => $value['buttons'] ?? [],
    // 
    //     ];
    // }
}
