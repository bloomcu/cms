<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class WikisSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'wikis';
		$this->filename = base_path().'/database/seeds/wikis.csv';
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
