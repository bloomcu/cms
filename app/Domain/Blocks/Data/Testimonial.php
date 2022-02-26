<?php

namespace Cms\Domain\Blocks\Data;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Elements\Image;

class Testimonial extends DataTransferObject
{
    public static function get(?array $value)
    {
        return [
            'testimonial' => $value['testimonial'] ?? '',
            'title'       => $value['title'] ?? '',
            'subtitle'    => $value['subtitle'] ?? '',
            'image'       => isset($value['image']) ? Image::get($value['image']['id']) : new Image(),
        ];
    }
}
