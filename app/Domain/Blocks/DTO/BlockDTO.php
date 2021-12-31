<?php

namespace Cms\Domain\Blocks\DTO;

use Spatie\DataTransferObject\DataTransferObject;

use Cms\Domain\Blocks\DTO\HeroDataDTO;

class BlockDTO extends DataTransferObject
{
    public ?string     $uuid;
    public string      $title;
    public string      $component;
    public string      $layout_id;
    // public array       $data;
    public HeroDataDTO $data;

    // public static function fromRequest(array $request): self
    // {
    //     return new self([
    //         'uuid'      => $request['uuid'] ?? null,
    //         'title'     => $request['title'],
    //         'component' => $request['component'],
    //         'layout_id' => intval($request['layout_id']),
    //         'data'      => HeroDataDTO::fromRequest($request['data']),
    //     ]);
    // }

    // public static function fromRequest(array $request): self
    // {
    //     return new self([
    //         'uuid'      => $request['uuid'] ?? null,
    //         'title'     => $request['title'],
    //         'component' => $request['component'],
    //         'layout_id' => intval($request['layout_id']),
    //         'data'      => [
    //             'label'    => $request['data']['label'] ?? null,
    //             'title'    => $request['data']['title'] ?? null,
    //             'subtitle' => $request['data']['subtitle'] ?? null,
    //         ]
    //     ]);
    // }
}
