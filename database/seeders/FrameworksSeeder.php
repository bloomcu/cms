<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class FrameworksSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'frameworks';
		$this->filename = base_path().'/database/seeds/frameworks.csv';
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
