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
        // $blueprintBlocks = [
        //     [
        //         'title' => 'Hero',
        //         'property_id' => 1,
        //         'component' => 'Hero',
        //         'group' => 'hero',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 80,
        //     ],
        //     [
        //         'title' => 'Boxed Hero',
        //         'property_id' => 1,
        //         'component' => 'BoxedHero',
        //         'group' => 'hero',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 80,
        //     ],
        //     [
        //         'title' => 'Video Background Hero',
        //         'property_id' => 1,
        //         'component' => 'VideoBackgroundHero',
        //         'group' => 'video-background-hero',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 80,
        //     ],
        //     [
        //         'title' => 'Feature',
        //         'property_id' => 1,
        //         'component' => 'Feature',
        //         'group' => 'feature',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 81,
        //     ],
        //     [
        //         'title' => 'Feature V11',
        //         'property_id' => 1,
        //         'component' => 'FeatureV11',
        //         'group' => 'feature',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 81,
        //     ],
        //     // [
        //     //     'title' => 'Feature V7',
        //     //     'property_id' => 1,
        //     //     'component' => 'FeatureV7',
        //     //     'group' => 'feature',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 81,
        //     // ],
        //     // [
        //     //     'title' => 'Feature V9',
        //     //     'property_id' => 1,
        //     //     'component' => 'FeatureV7=9',
        //     //     'group' => 'feature',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 81,
        //     // ],
        //     [
        //         'title' => 'Text Columns',
        //         'property_id' => 1,
        //         'component' => 'TextColumns',
        //         'group' => 'text-columns',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 82,
        //     ],
        //     // [
        //     //     'title' => 'Cards',
        //     //     'property_id' => 1,
        //     //     'component' => 'CardRepeater',
        //     //     'group' => 'cards',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 83,
        //     // ],
        //     // [
        //     //     'title' => 'Details List',
        //     //     'property_id' => 1,
        //     //     'component' => 'DetailsList',
        //     //     'group' => 'heros',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 84,
        //     // ],
        //     // [
        //     //     'title' => 'Steps',
        //     //     'property_id' => 1,
        //     //     'component' => 'Steps',
        //     //     'group' => 'steps',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 85,
        //     // ],
        //     [
        //         'title' => 'Table',
        //         'property_id' => 1,
        //         'component' => 'AppTable',
        //         'group' => 'table',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 86,
        //     ],
        //     [
        //         'title' => 'Testimonial',
        //         'property_id' => 1,
        //         'component' => 'Testimonial',
        //         'group' => 'testimonial',
        //         'is_blueprint' => true,
        //         'data' => [],
        //         'category_id' => 87,
        //     ],
        //     // [
        //     //     'title' => 'Accordion',
        //     //     'property_id' => 1,
        //     //     'component' => 'Accordion',
        //     //     'group' => 'accordion',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 88,
        //     // ],
        //     // [
        //     //     'title' => 'Gallery',
        //     //     'property_id' => 1,
        //     //     'component' => 'Gallery',
        //     //     'group' => 'gallery',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => 89,
        //     // ],
        //     // [
        //     //     'title' => 'Navbar',
        //     //     'property_id' => 1,
        //     //     'component' => 'Navbar',
        //     //     'group' => 'navigation',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => null,
        //     // ],
        //     // [
        //     //     'title' => 'Footer',
        //     //     'property_id' => 1,
        //     //     'component' => 'Footer',
        //     //     'group' => 'navigation',
        //     //     'is_blueprint' => true,
        //     //     'data' => [],
        //     //     'category_id' => null,
        //     // ],
        // ];
        
        $blueprintBlocks = [
            [
                'title' => 'Hero',
                'property_id' => 1,
                'component' => 'Hero',
                'group' => 'hero',
                'is_blueprint' => true,
                'data' => [
                    'label' => 'Label',
                    'title' => 'Title placeholder',
                    'subtitle' => 'This is the subtitle placeholder',
                    'image' => [
                        'file_id' => 11
                    ]
                ],
                'category_id' => 80,
            ],
            [
                'title' => 'Boxed Hero',
                'property_id' => 1,
                'component' => 'BoxedHero',
                'group' => 'hero',
                'is_blueprint' => true,
                'data' => [
                    'label' => 'Label',
                    'title' => 'Title placeholder',
                    'subtitle' => 'This is the subtitle placeholder',
                    'image' => [
                        'file_id' => 11
                    ]
                ],
                'category_id' => 80,
            ],
            [
                'title' => 'Video Background Hero',
                'property_id' => 1,
                'component' => 'VideoBackgroundHero',
                'group' => 'video-background-hero',
                'is_blueprint' => true,
                'data' => [
                    'label' => 'Label',
                    'title' => 'Title placeholder',
                    'subtitle' => 'This is the subtitle placeholder',
                    'image' => [
                        'file_id' => 11
                    ]
                ],
                'category_id' => 80,
            ],
            [
                'title' => 'Feature',
                'property_id' => 1,
                'component' => 'Feature',
                'group' => 'feature',
                'is_blueprint' => true,
                'data' => [
                    'label' => 'Label',
                    'title' => 'Title placeholder',
                    'subtitle' => 'This is the subtitle placeholder',
                    'image' => [
                        'file_id' => 11
                    ]
                ],
                'category_id' => 81,
            ],
            [
                'title' => 'Feature V11',
                'property_id' => 1,
                'component' => 'FeatureV11',
                'group' => 'feature',
                'is_blueprint' => true,
                'data' => [
                    'label' => 'Label',
                    'title' => 'Title placeholder',
                    'subtitle' => 'This is the subtitle placeholder',
                    'image' => [
                        'file_id' => 11
                    ]
                ],
                'category_id' => 81,
            ],
            [
                'title' => 'Text Columns',
                'property_id' => 1,
                'component' => 'TextColumns',
                'group' => 'text-columns',
                'is_blueprint' => true,
                'data' => [
                    'columns' => [
                        [
                            'label' => 'Label',
                            'title' => 'Column One',
                            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sem lorem, eleifend eget eros id, vulputate.',
                        ],
                        [
                            'label' => 'Label',
                            'title' => 'Column Two',
                            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sem lorem, eleifend eget eros id, vulputate.',
                        ]
                    ]
                ],
                'category_id' => 82,
            ],
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
                    'data' => [
                        'testimonial' => 'The testimonial lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi atque doloremque beatae! Doloremque perspiciatis aliquid repellat quasi praesentium',
                        'title' => 'The testimonial title',
                        'subtitle' => 'The testimonial subtitle',
                        'image' => [
                            'file_id' => 11
                        ]
                    ],
                    'category_id' => 87,
                ],
        ];
        
        foreach ($blueprintBlocks as $seed) {
            $block = Block::create([
                'title'        => $seed['title'],
                'property_id'  => $seed['property_id'],
                'component'    => $seed['component'],
                'group'        => $seed['group'],
                // 'group'        => 'hero',
                'is_blueprint' => $seed['is_blueprint'],
                'data'         => $seed['data'],
            ]);
            
            $block->categories()->attach($seed['category_id']);
        }
        
        // $blocksForPosts = [
        //     [
        //         'title' => 'Hero',
        //         'property_id' => 1,
        //         'component' => 'Hero',
        //         'group' => 'hero',
        //         'post_id' => 2,
        //         'data' => []
        //     ],
        //     [
        //         'title' => 'Video Background Hero',
        //         'property_id' => 1,
        //         'component' => 'VideoBackgroundHero',
        //         'post_id' => 2,
        //         'group' => 'video-background-hero',
        //         'data' => []
        //     ],
        //     [
        //         'title' => 'Feature',
        //         'property_id' => 1,
        //         'component' => 'Feature',
        //         'group' => 'feature',
        //         'post_id' => 2,
        //         'data' => []
        //     ],
        // ];
        // 
        // foreach ($blocksForPosts as $seed) {
        //     $block = Block::create($seed);
        // }
    }
}
