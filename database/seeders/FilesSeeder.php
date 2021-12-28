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
        $files = [
            [
                'organization_id' => 1,
                'user_id' => 1,
                'type' => 'image',
                'name' => 'image-1.jpg',
                'path' => 'files/fda5adba21b49f939754d6db5eb1961a.jpg',
                'size' => 5000
            ],
            [
                'organization_id' => 1,
                'user_id' => 1,
                'type' => 'image',
                'name' => 'image-2.jpg',
                'path' => 'files/a9232ca8105bb67d216d138f0e0169a4.jpg',
                'size' => 5000
            ],
            [
                'organization_id' => 1,
                'user_id' => 1,
                'type' => 'image',
                'name' => 'image-3.jpg',
                'path' => 'files/0af6d8c297630b89ff66d494f01f43b4.jpg',
                'size' => 5000
            ],
        ];

        foreach ($files as $file) {
            File::create($file);
            // File::factory()->state([
            //     'organization_id' => 1,
            //     'path' => $file
            // ])
            // ->create();
        }
    }
}
