<?php

namespace Database\Seeders;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Rates\RateTableGroup;
use Illuminate\Database\Seeder;

class RateTableGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $organization = Organization::first();
        $rates_groups = [
            [
               'title' => 'Lorem',
               'organization_id' => $organization->id
            ],
            [
                'title' => 'Ipsum',
                'organization_id' => $organization->id
             ],
         
            
        ];

        foreach ($rates_groups as $rates_group) {
            RateTableGroup::create($rates_group);
        }
    }
}
