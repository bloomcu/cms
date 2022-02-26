<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Posts\Post;

class Button extends DataTransferObject
{
    public ?string $type = 'internal';
    public ?int    $post_id = null;
    // public ?string $post_url = '';
    public ?string $variant = 'primary';
    public ?string $text = 'Button';
    public ?string $href = '';
    public ?string $size = '';
    public ?string $trigger = '';
    public ?string $target = '';
    
    public static function get(array $button)
    {
        // $post = Post::find($post_id);
        // return new static([
        //     ...$button,
        //     'text' => 'Override the text',
        // ]);
        
        if ($button['type'] == 'internal') {
            $post = Post::find($button['post_id']);
            // $button['post_url'] = $post->url;
            $button['href'] = $post->url;
        }
        
        if ($button['type'] == 'external') {
            $url = parse_url($button['href']);

            if (!isset($url['scheme'])) {
                $button['href'] = 'https://' . parse_url($button['href'])['path'];
            }
        }
        
        return new static(
            $button
            
            // post_id:  $button['post_id'] ?? null,
            // post_url: $button['post_url'] ?? '',
            // variant:  $button['variant'] ?? 'primary',
            // text:     $button['text'] ?? 'Button',
            // href:     $button['href'] ?? '',
            // size:     $button['size'] ?? '',
            // trigger:  $button['trigger'] ?? '',
            // target:   $button['target'] ?? '',
        );
    }
    
    public static function collection(array $buttons)
    {
        return collect($buttons)->map(function($button) {
            // return new self($button);
            return self::get($button);
        });
    }
    
    // public static function get(array $value)
    // {
    //     // $post = Post::find($id);
    // 
    //     return [
    //         'variant' => $value['variant'] ?? 'primary',
    //         'text'    => $value['text']    ?? 'Button',
    //         'post'    => $value['text']    ?? null,
    //         'href'    => $value['href']    ?? '',
    //         'size'    => $value['size']    ?? '',
    //         'trigger' => $value['trigger'] ?? '',
    //         'target'  => $value['target']  ?? '',
    //     ];
    // }

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
