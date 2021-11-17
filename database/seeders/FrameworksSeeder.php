<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Frameworks\Framework;

class FrameworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Framework::factory()->count(3)->create();
    }
}
