<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Layout;
use App\Models\Block;
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
        Layout::factory()->count(3)
            ->has(Post::factory()->count(10))
            ->create();
    }
}
