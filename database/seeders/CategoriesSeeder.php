<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Categories\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(3)->create();
    }
}
