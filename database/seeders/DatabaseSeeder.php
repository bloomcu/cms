<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Organization;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed 1 Organization
        $organization = Organization::factory()
            ->state([
                'name' => 'Redwood',
                'slug' => 'redwood',
                'database' => 'cms_redwood'
            ])->create();

        $this->call([
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
