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
            UsersSeeder::class,
            OrganizationsSeeder::class,
            CategoriesSeeder::class,
            PagesSeeder::class,
            LayoutsSeeder::class,
            BlocksSeeder::class,
            FilesSeeder::class
        ]);
    }
}
