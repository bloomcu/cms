<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class CategoriesSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'categories';
		$this->filename = base_path().'/database/seeds/categories.csv';
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
