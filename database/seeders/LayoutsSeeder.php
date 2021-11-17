<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Layouts\Layout;

class LayoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layout::factory()->count(3)->create();
    }
}
