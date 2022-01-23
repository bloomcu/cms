<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Properties\Property;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'title' => 'Primary Website',
                'organization_id' => 1,
            ],
            [
                'title' => 'Community Website',
                'organization_id' => 1,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
