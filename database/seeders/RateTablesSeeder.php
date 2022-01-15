<?php

namespace Database\Seeders;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Rates\RateTableGroup;
use Cms\Domain\Rates\RateTable;
use Illuminate\Database\Seeder;

class RateTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = Organization::first();
        $rate_group = RateTableGroup::first();
        $tables = [
            [
                'name'=>'Auto (New)',
                'rate_table_group_id' => $rate_group->id,
                'organization_id' => $organization->id

            ],
            [
                'name'=>'Auto (Used)',
                'rate_table_group_id' => $rate_group->id,
                'organization_id' => $organization->id
            ],
            [
                'name'=>'IRA',
                'rate_table_group_id' => $rate_group->id,
                'organization_id' => $organization->id
            ]
        ];
        foreach ($tables as $table) {
            RateTable::create($table);
        }
    }
}
