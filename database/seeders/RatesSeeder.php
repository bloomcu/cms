<?php

namespace Database\Seeders;

use Cms\Domain\Rates\RateTableGroup;
use Cms\Domain\Rates\Rate;
use Cms\Domain\Rates\RateTable;
use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rate_table = RateTable::first();
        $rates = [
            [
                'col_id' => 0,
                'row_id' => 0,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 1,
                'row_id' => 0,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 2,
                'row_id' => 0,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 0,
                'row_id' => 1,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 1,
                'row_id' => 1,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 2,
                'row_id' => 1,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 0,
                'row_id' => 2,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 1,
                'row_id' => 2,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            [
                'col_id' => 2,
                'row_id' => 2,
                'data' => '2%',
                'rate_table_id' => $rate_table->id
            ],
            
        ];

        foreach ($rates as $rate) {
           Rate::create($rate);
        }
    }
}
