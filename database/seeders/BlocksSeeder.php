<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class BlocksSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'blocks';
		$this->filename = base_path().'/database/seeds/blocks.csv';
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
