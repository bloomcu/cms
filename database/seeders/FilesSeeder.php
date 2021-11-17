<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Files\File;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::factory()->count(3)->state(['organization_id' => 1])->create();
    }
}
