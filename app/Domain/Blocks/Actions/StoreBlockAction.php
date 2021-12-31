<?php

namespace Cms\Domain\Blocks\Actions;

use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\DTO\BlockDTO;

class StoreBlockAction
{
    // public function execute(array $request): Block
    // {
    //     return Block::create([
    //         'uuid'      => $request['uuid'] ?? null,
    //         'title'     => $request['title'],
    //         'component' => $request['component'],
    //         'layout_id' => $request['layout_id'],
    //         'data'      => $request['data'],
    //     ]);
    // }

    public function execute(BlockDTO $dto): Block
    {
        return Block::create([
            'uuid'      => $dto->uuid,
            'title'     => $dto->title,
            'component' => $dto->component,
            'layout_id' => $dto->layout_id,
            'data'      => $dto->data,
        ]);
    }
}
