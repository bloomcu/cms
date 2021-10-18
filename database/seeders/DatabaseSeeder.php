<?php

namespace Database\Seeders;

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
        $this->call([
            OrganizationsSeeder::class,
            CategoriesSeeder::class,
            PagesSeeder::class,
            BaseBlocksSeeder::class,
            BlocksSeeder::class,
            FrameworksSeeder::class,
            WikisSeeder::class,
            FilesSeeder::class
        ]);
    }
}
