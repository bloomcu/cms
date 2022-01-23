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
                'property_id' => 1,
                'component' => 'hero',
                // 'category_id' => 'heros',
                'layout_id' => 2,
                'data' => [
                    'label' => 'The label',
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
            [
                'title' => 'Feature',
                'property_id' => 1,
                'component' => 'feature',
                // 'category_id' => 'features',
                'layout_id' => 2,
                'data' => [
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
            [
                'title' => 'Hero',
                'property_id' => 1,
                'component' => 'hero',
                // 'category_id' => 'heros',
                'layout_id' => 3,
                'data' => [
                    'label' => 'The label',
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
            [
                'title' => 'Feature',
                'property_id' => 1,
                'component' => 'feature',
                // 'category_id' => 'features',
                'layout_id' => 3,
                'data' => [
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
