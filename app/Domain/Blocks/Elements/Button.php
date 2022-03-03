<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Posts\Post;

class Button extends DataTransferObject
{
    public string $type = 'internal';
    public ?int    $post_id = null;
    public ?string $href = '';
    public ?string $variant = 'primary';
    public ?string $text = 'Button';
    public ?string $size = '';
    public ?string $trigger = '';
    public ?string $target = '';
    
    public static function get(?array $button)
    {
        if ($button) {
            if ($button['type'] == 'internal' && $button['post_id']) {
                $post = Post::find($button['post_id']);
                $button['href'] = $post->url;
            }
            
            if ($button['type'] == 'external' && $button['href']) {
                $url = parse_url($button['href']);

                if (!isset($url['scheme'])) {
                    $button['href'] = 'https://' . parse_url($button['href'])['path'];
                }
            }
            
            return new static($button);
        }
        
        return new static();
    }
    
    public static function collection(array $buttons)
    {
        return collect($buttons)->map(function($button) {
            return self::get($button);
        });
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
