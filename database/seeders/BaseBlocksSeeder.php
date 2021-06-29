<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class BaseBlocksSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'base_blocks';
		$this->filename = base_path().'/database/seeds/base_blocks.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
