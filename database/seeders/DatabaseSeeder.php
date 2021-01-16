<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Layout;
use App\Models\Block;
use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Seed 100 posts
         *
         */
        for ($i = 0; $i < 100; $i++) {

            // Create a page with 1 layout and 5 blocks
            $page = Page::factory()
                ->for(Layout::factory()
                    ->has(Block::factory()->count(5))
                )
                ->create();

            // Create content for each block
            foreach ($page->layout->blocks as $block) {
                Content::factory()
                    ->state([
                        'block_id' => $block->id,
                        'page_id' => $page->id
                    ])
                    ->create();
            }
        }

        // Almost works
        // Layout::factory()->count(100)
        //     ->has(Block::factory()->count(5)
        //         ->has(Content::factory()))
        //     // ->has(Post::factory())
        //     ->create();

    }
}
