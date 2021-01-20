<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Models\Category;
use App\Models\Page;
use App\Models\Layout;
use App\Models\Block;
use App\Models\Content;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed 1 company
        $company = Company::factory()
        ->state([
            'name' => 'Redwood',
            'slug' => 'redwood',
            'database' => 'cms_redwood'
        ])->create();

        // // Seed 100 pages each with a layout and 5 blocks
        // for ($i = 0; $i < 100; $i++) {
        //     $page = Page::factory()
        //         ->state([
        //             'company_id' => $company->id
        //         ])
        //         ->for(Layout::factory()
        //             ->has(Block::factory()->count(5))
        //         )->create();
        //
        //     // Create content for each block
        //     foreach ($page->layout->blocks as $block) {
        //         Content::factory()
        //             ->state([
        //                 'block_id' => $block->id,
        //                 'page_id' => $page->id
        //             ])->create();
        //     }
        // }

        // Almost works
        // Layout::factory()->count(100)
        //     ->has(Block::factory()->count(5)
        //         ->has(Content::factory()))
        //         ->has(Post::factory())
        //     ->create();

    }
}
