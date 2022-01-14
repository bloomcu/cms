<?php

namespace Database\Seeders;

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
        $rate_group = RateTableGroup::first();
        $tables = [
            [
                'name'=>'Auto (New)',
                'rate_table_group_id' => $rate_group->id
            ],
            [
                'name'=>'Auto (Used)',
                'rate_table_group_id' => $rate_group->id
            ],
            [
                'name'=>'IRA',
                'rate_table_group_id' => $rate_group->id
            ]
        ];
        foreach ($tables as $table) {
            RateTable::create($table);
        }
    }
}
