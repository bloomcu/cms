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
            PropertiesSeeder::class,
            CategoriesSeeder::class,
            PagesSeeder::class,
            ArticlesSeeder::class,
            LayoutsSeeder::class,
            BlocksSeeder::class,
            FilesSeeder::class,
            MenusSeeder::class
        ]);
    }
}
