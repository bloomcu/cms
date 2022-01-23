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
                // 'is_published' => false,
                'is_blueprint' => true,
                'property_id' => 1,
                // 'category_id' => null,
            ],
            [
                'title' => 'Homepage',
                // 'is_published' => true,
                'is_blueprint' => false,
                'property_id' => 1,
                // 'category_id' => 2,
            ],
            [
                'title' => 'Checking',
                // 'is_published' => true,
                'is_blueprint' => false,
                'property_id' => 1,
                // 'category_id' => 4,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
