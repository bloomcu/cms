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
                'title' => 'Website',
                'organization_id' => 1,
            ],
            [
                'title' => 'Community Site',
                'organization_id' => 1,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
