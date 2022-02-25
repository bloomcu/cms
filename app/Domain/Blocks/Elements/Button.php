<?php

namespace Cms\Domain\Blocks\Elements;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Posts\Post;

class Button extends DataTransferObject
{
    public ?int    $post_id = null;
    public ?string $variant = 'primary';
    public ?string $text = 'Button';
    public ?string $href = '';
    public ?string $size = '';
    public ?string $trigger = '';
    public ?string $target = '';
    
    public static function get(array $button)
    {
        // $post = Post::find($post_id);
        
        return new static(
            post_id: $button->post_id,
            variant: $button->variant,
            text:    $button->text,
            href:    $button->href,
            size:    $button->size,
            trigger: $button->trigger,
            target:  $button->target,
        );
    }
    
    // public static function get(array $value)
    // {
    //     // $file = File::find($file_id);
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
    
    public static function collection(array $buttons)
    {
        return collect($buttons)->map(function($button) {
            return new self($button);
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
