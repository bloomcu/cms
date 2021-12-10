<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Cms\Domain\Organizations\Organization;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create([
            'title' => 'BloomCU'
        ]);
    }
}
