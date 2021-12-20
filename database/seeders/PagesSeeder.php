<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Pages\Page;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Blocks\Block;
use Cms\Domain\Organizations\Organization;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Blank Page',
                'is_published' => false,
                'is_blueprint' => true,
                'organization_id' => 1,
                'category_id' => null,
            ],
            [
                'title' => 'Homepage',
                'is_published' => true,
                'is_blueprint' => false,
                'organization_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'Checking',
                'is_published' => true,
                'is_blueprint' => false,
                'organization_id' => 1,
                'category_id' => 4,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }

        // $pages = ['Homepage', 'About', 'Contact'];
        //
        // foreach ($pages as $page) {
        //     Page::factory()->state([
        //         'title' => $page,
        //         'organization_id' => 1
        //     ])
        //     ->has(Layout::factory()->state(['organization_id' => 1])
        //         ->has(Block::factory()->count(3)->state(['component' => 'hero'])))
        //     ->create();
        // }
    }
}
