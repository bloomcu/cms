<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Utilities\BlockConfig;
use Cms\Domain\Blocks\Elements\Image;
use Cms\Domain\Blocks\Elements\Video;
use Cms\Domain\Blocks\Elements\Button;

class VideoBackgroundHero extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'align'      => $value['align'] ?? 'left',
            'fullscreen' => $value['fullscreen'] ?? false,
            'label'      => $value['label'] ?? '',
            'title'      => $value['title'] ?? '',
            'subtitle'   => $value['subtitle'] ?? '',
            'video'      => isset($value['video']) ? Video::get($value['video']) : new Video(),
            'image'      => isset($value['image']) ? Image::get($value['image']) : new Image(),
            'buttons'    => isset($value['buttons']) ? Button::collection($value['buttons']) : [ new Button() ],
            'config'     => isset($value['config']) ? BlockConfig::get($value['config']) : BlockConfig::get([
                'headingLevel' => '1',
                'headingSize' => 'xxxl',
                'paddingTop' => 'xxl',
                'paddingBottom' => 'xxl',
                'marginTop' => 'none',
                'marginBottom' => 'none',
            ]),
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
