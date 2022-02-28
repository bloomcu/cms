<?php

namespace Cms\Domain\Blocks\Components;

use Spatie\DataTransferObject\DataTransferObject;

class ContentComponent extends DataTransferObject
{           
    public ?string $label    = '';
    public ?string $title    = 'Title';
    public ?string $subtitle = '';
    public ?string $body     = 'Body';
    
    public static function get(array $content)
    {
        return new self([
            'label' => $content['label'] ?? '',
            'title' => $content['title'] ?? '',
            'subtitle' => $content['subtitle'] ?? '',
            'body' => $content['body'] ?? '',
        ]);
    }
    
    public static function collection(array $contents)
    {
        return collect($contents)->map(function($content) {
            return self::get($content);
        });
    }
}
