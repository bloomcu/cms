<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class PagesSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'pages';
		$this->filename = base_path().'/database/seeds/pages.csv';
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
