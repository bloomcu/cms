<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class FilesSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'files';
		$this->filename = base_path().'/database/seeds/files.csv';
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
