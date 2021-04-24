<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create([
             'name' => 'ONG',
             'email' => 'ong@email.com',
             'cnpj' => '11879562000173',
             'website' => 'https://ong.org',
             'phone_number' => '0800 123 1234',
             'active' => 1,
         ]);
    }
}
