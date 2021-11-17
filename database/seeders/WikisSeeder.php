<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Wikis\Wiki;

class WikisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wiki::factory()->count(3)->create();
    }
}
