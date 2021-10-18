<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class OrganizationsSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'organizations';
		$this->filename = base_path().'/database/seeds/organizations.csv';
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
