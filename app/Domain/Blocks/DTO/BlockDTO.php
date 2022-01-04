<?php

namespace Cms\Domain\Blocks\DTO;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\DTO\HeroDataDTO;

class BlockDTO extends DataTransferObject
{
    public string $uuid;
    public string $title;
    public string $component;
    public int    $layout_id;
    public ?int   $order;
    public ?array $data;

    public static function fromModel(Block $block): self
    {
        return new self([
            'uuid'      => $block->uuid,
            'title'     => $block->title,
            'component' => $block->component,
            'layout_id' => $block->layout_id,
            'order'     => $block->order,
            'data'      => HeroDataDTO::fromJson(...$block->data),
        ]);
    }

}
