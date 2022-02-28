<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Utilities\BlockConfig;
use Cms\Domain\Blocks\Elements\Image;
use Cms\Domain\Blocks\Elements\Button;

class Feature extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'orientation' => $value['orientation'] ?? 'left',
            'label'    => $value['label'] ?? '',
            'title'    => $value['title'] ?? '',
            'subtitle' => $value['subtitle'] ?? '',
            'image'    => isset($value['image']) ? Image::get($value['image']['id']) : new Image(),
            'buttons'  => isset($value['buttons']) ? Button::collection($value['buttons']) : [ new Button() ],
            'config'   => isset($value['config']) ? BlockConfig::get($value['config']) : BlockConfig::get([
                'headingLevel' => '2',
                'headingSize' => 'xl',
            ]),
        ];
    }
}
