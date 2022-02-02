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
                'title' => 'Navbar',
                'property_id' => 1,
                'component' => 'navbar',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Hero',
                'property_id' => 1,
                'component' => 'hero',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
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
                'is_blueprint' => true,
                // 'category_id' => 'features',
                'data' => [
                    'title' => 'This is the title',
                    'subtitle' => 'And this is the subtitle, it is longer',
                ]
            ],
            [
                'title' => 'Text',
                'property_id' => 1,
                'component' => 'text',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Feature',
                'property_id' => 1,
                'component' => 'feature',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Card',
                'property_id' => 1,
                'component' => 'card',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Testimonial',
                'property_id' => 1,
                'component' => 'testimonial',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Accordion',
                'property_id' => 1,
                'component' => 'accordion',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Gallery',
                'property_id' => 1,
                'component' => 'gallery',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Details',
                'property_id' => 1,
                'component' => 'details',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Steps',
                'property_id' => 1,
                'component' => 'steps',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Table',
                'property_id' => 1,
                'component' => 'table',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
            [
                'title' => 'Footer',
                'property_id' => 1,
                'component' => 'footer',
                'is_blueprint' => true,
                // 'category_id' => 'heros',
            ],
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
