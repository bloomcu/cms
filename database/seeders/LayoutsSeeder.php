<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class LayoutsSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'layouts';
		$this->filename = base_path().'/database/seeds/layouts.csv';
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
