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
        Post::factory(10)->create();
        Layout::factory(10)->create();
        Block::factory(10)->create();
        User::factory(10)->create();
    }
}
