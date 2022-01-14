<?php

namespace Database\Seeders;

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
        $rates_groups = [
            [
               'title' => 'Lorem'
            ],
            [
                'title' => 'Ipsum'
             ],
         
            
        ];

        foreach ($rates_groups as $rates_group) {
            RateTableGroup::create($rates_group);
        }
    }
}
