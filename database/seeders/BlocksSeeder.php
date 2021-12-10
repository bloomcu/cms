<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Blocks\Block;

class BlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocks = [
            [
                'title' => 'Hero',
                'component' => 'hero',
                'type' => 'base',
                'category_id' => 'heros',
                'data' => [
                    'label' => 'The label',
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
            [
                'title' => 'Feature',
                'component' => 'feature',
                'type' => 'base',
                'category_id' => 'features',
                'data' => [
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }

        // $layoutBlocks = [
        //     [
        //         'title' => 'Hero',
        //         'type' => 'block',
        //         'component' => 'hero',
        //         'layout_id' => 1,
        //         'order' => 1,
        //         'data' => [
        //             'label' => 'The label',
        //             'title' => 'This is the title',
        //             'subtitle' => 'And this is the subtitle, it is longer',
        //         ]
        //     ],
        //     [
        //         'title' => 'Feature',
        //         'type' => 'block',
        //         'component' => 'feature',
        //         'layout_id' => 1,
        //         'order' => 2,
        //         'data' => [
        //             'title' => 'This is the title',
        //             'subtitle' => 'And this is the subtitle, it is longer',
        //         ]
        //     ],
        //     [
        //         'title' => 'Hero',
        //         'type' => 'block',
        //         'component' => 'hero',
        //         'layout_id' => 2,
        //         'order' => 1,
        //         'data' => [
        //             'label' => 'The label',
        //             'title' => 'This is the title',
        //             'subtitle' => 'And this is the subtitle, it is longer',
        //         ]
        //     ],
        //     [
        //         'title' => 'Feature',
        //         'type' => 'block',
        //         'component' => 'feature',
        //         'layout_id' => 2,
        //         'order' => 2,
        //         'data' => [
        //             'title' => 'This is the title',
        //             'subtitle' => 'And this is the subtitle, it is longer',
        //         ]
        //     ],
        // ];
        //
        // foreach ($layoutBlocks as $block) {
        //     Block::create($block);
        // }
    }
}
