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
        $blueprintBlocks = [
            [
                'title' => 'Hero',
                'property_id' => 1,
                'component' => 'Hero',
                'group' => 'hero',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 80,
            ],
            [
                'title' => 'Boxed Hero',
                'property_id' => 1,
                'component' => 'BoxedHero',
                'group' => 'hero',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 80,
            ],
            [
                'title' => 'Video Background Hero',
                'property_id' => 1,
                'component' => 'VideoBackgroundHero',
                'group' => 'video-background-hero',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 80,
            ],
            [
                'title' => 'Feature',
                'property_id' => 1,
                'component' => 'Feature',
                'group' => 'feature',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 81,
            ],
            [
                'title' => 'Feature V11',
                'property_id' => 1,
                'component' => 'FeatureV11',
                'group' => 'feature',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 81,
            ],
            // [
            //     'title' => 'Feature V7',
            //     'property_id' => 1,
            //     'component' => 'FeatureV7',
            //     'group' => 'feature',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 81,
            // ],
            // [
            //     'title' => 'Feature V9',
            //     'property_id' => 1,
            //     'component' => 'FeatureV7=9',
            //     'group' => 'feature',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 81,
            // ],
            [
                'title' => 'Text Columns',
                'property_id' => 1,
                'component' => 'TextColumns',
                'group' => 'text-columns',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 82,
            ],
            // [
            //     'title' => 'Cards',
            //     'property_id' => 1,
            //     'component' => 'CardRepeater',
            //     'group' => 'cards',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 83,
            // ],
            // [
            //     'title' => 'Details List',
            //     'property_id' => 1,
            //     'component' => 'DetailsList',
            //     'group' => 'heros',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 84,
            // ],
            // [
            //     'title' => 'Steps',
            //     'property_id' => 1,
            //     'component' => 'Steps',
            //     'group' => 'steps',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 85,
            // ],
            [
                'title' => 'Table',
                'property_id' => 1,
                'component' => 'AppTable',
                'group' => 'table',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 86,
            ],
            [
                'title' => 'Testimonial',
                'property_id' => 1,
                'component' => 'Testimonial',
                'group' => 'testimonial',
                'is_blueprint' => true,
                'data' => [],
                'category_id' => 87,
            ],
            // [
            //     'title' => 'Accordion',
            //     'property_id' => 1,
            //     'component' => 'Accordion',
            //     'group' => 'accordion',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 88,
            // ],
            // [
            //     'title' => 'Gallery',
            //     'property_id' => 1,
            //     'component' => 'Gallery',
            //     'group' => 'gallery',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => 89,
            // ],
            // [
            //     'title' => 'Navbar',
            //     'property_id' => 1,
            //     'component' => 'Navbar',
            //     'group' => 'navigation',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => null,
            // ],
            // [
            //     'title' => 'Footer',
            //     'property_id' => 1,
            //     'component' => 'Footer',
            //     'group' => 'navigation',
            //     'is_blueprint' => true,
            //     'data' => [],
            //     'category_id' => null,
            // ],
        ];
        
        foreach ($blueprintBlocks as $seed) {
            $block = Block::create([
                'title'        => $seed['title'],
                'property_id'  => $seed['property_id'],
                'component'    => $seed['component'],
                'group'        => $seed['group'],
                'is_blueprint' => $seed['is_blueprint'],
                'data'         => $seed['data'],
            ]);
            
            $block->categories()->attach($seed['category_id']);
        }
        
        $blocksForLayouts = [
            // [
            //     'title' => 'Hero',
            //     'property_id' => 1,
            //     'component' => 'Hero',
            //     'group' => 'hero',
            //     'layout_id' => 2,
            //     'data' => [
            //         'label' => 'The hero label',
            //         'title' => 'This is the hero title',
            //         'subtitle' => 'And this is the hero subtitle, it is longer',
            //     ]
            // ],
            // [
            //     'title' => 'Video Background Hero',
            //     'property_id' => 1,
            //     'component' => 'VideoBackgroundHero',
            //     'layout_id' => 2,
            //     'group' => 'video-background-hero',
            //     'data' => [
            //         'label' => 'The video hero label',
            //         'title' => 'This is the video hero title',
            //         'subtitle' => 'And this is the video hero subtitle, it is longer',
            //     ]
            // ],
            // [
            //     'title' => 'Feature',
            //     'property_id' => 1,
            //     'component' => 'Feature',
            //     'group' => 'feature',
            //     'layout_id' => 2,
            //     'data' => [
            //         'label' => 'The feature label',
            //         'title' => 'This is the feature title',
            //         'subtitle' => 'And this is the feature subtitle, it is longer',
            //     ]
            // ],
        ];
        
        foreach ($blocksForLayouts as $seed) {
            $block = Block::create([
                'title'       => $seed['title'],
                'type'        => $seed['type'],
                'property_id' => $seed['property_id'],
                'created_at'  => $seed['created_at'],
            ]);
            
            $block->categories()->attach($seed['category_id']);
        }
    }
}
