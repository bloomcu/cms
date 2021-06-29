<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class ContentsSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'contents';
		$this->filename = base_path().'/database/seeds/contents.csv';
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
