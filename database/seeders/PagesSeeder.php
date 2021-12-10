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
                'title' => 'Homepage',
                'organization_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'Free Checking',
                'organization_id' => 1,
                'category_id' => 4,
            ],
            [
                'title' => 'About Us',
                'organization_id' => 1,
                'category_id' => 60,
            ]
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
