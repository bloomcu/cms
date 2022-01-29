<?php

namespace Database\Seeders;

use Cms\Domain\Table\Table;
use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tables  = [
            [
                'name' => 'Auto Loans',
                'data' => [
                    ['row 1 col 1','row 1 col 2', 'row 1 col 3'],
                    ['row 2 col 1','row 2 col 2', 'row 2 col 3'],
                    ['row 3 col 1','row 3 col 2', 'row 3 col 3'],
                    ['row 4 col 1','row 4 col 2', 'row 4 col 3']
                ]
            ],
            [
                'name' => 'Morgtage',
                'data' => [
                    ['row 1 col 1','row 1 col 2', 'row 1 col 3'],
                    ['row 2 col 1','row 2 col 2', 'row 2 col 3'],
                    ['row 3 col 1','row 3 col 2', 'row 3 col 3'],
                    ['row 4 col 1','row 4 col 2', 'row 4 col 3']
                ]
            ]

        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
       
      

    }
}
