<?php

namespace Cms\Domain\Blocks\Actions;

use Cms\Domain\Blocks\Block;

use Cms\Domain\Blocks\DTO\SetBlockDTO;

class StoreBlockAction
{
    public static function execute(SetBlockDTO $dto): Block
    {
        $block = Block::create(
            $dto->toArray()
        );

        return $block->fresh();
    }

    // public function execute(SetBlockDTO $dto): Block
    // {
    //     return Block::create(
    //         $dto->toArray()
    //     );
    // }

    // public function execute(array $data): Block
    // {
    //     $block = Block::create([
    //         'uuid'      => $data['uuid'],
    //         'title'     => $data['title'],
    //         'component' => $data['component'],
    //         'layout_id' => $data['layout_id'],
    //         'data'      => $data['data'],
    //     ]);
    //     return $block;
    //     // return $block->fresh();
    // }
}
