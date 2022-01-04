<?php

namespace Cms\Domain\Blocks\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class SetBlockDTO extends DataTransferObject
{
    public ?string $uuid;
    public string $title;
    public string $component;
    public string $layout_id;
    public ?array $data;

    // public static function fromArray(array $request): self
    // {
    //     return new self([
    //         'uuid'      => $block->uuid,
    //         'title'     => $block->title,
    //         'component' => $block->component,
    //         'layout_id' => $block->layout_id,
    //         'data'      => $block->data,
    //     ]);
    // }

}
