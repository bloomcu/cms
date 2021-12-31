<?php

namespace Cms\Domain\Blocks\DTO;

use Illuminate\Support\Arr;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\DTO\ImageDTO;

class HeroDataDTO extends DataTransferObject
{
    public ?string  $label;
    public ?string  $title;
    public ?string  $subtitle;
    // public ?array   $image;
    public ?ImageDTO $image;

    // public static function fromRequest(array $request): self
    // {
    //     return new self([
    //         'label'    => $request['label'] ?? null,
    //         'title'    => $request['title'] ?? null,
    //         'subtitle' => $request['subtitle'] ?? null,
    //         // 'image' => ImageDTO::fromRequest($request['image']),
    //         // 'image' => ImageDTO::fromRequest($request['image'] ?? []),
    //         'image' => isset($request['image']) ? ImageDTO::fromRequest($request['image']) : [],
    //         // 'image' => Arr::exists($request, 'image') ? ImageDTO::fromRequest($request['image']) : [],
    //     ]);
    // }
}
