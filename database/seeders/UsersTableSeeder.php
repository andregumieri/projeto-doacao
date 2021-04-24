<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Donor da Silva',
            'email' => 'user@email.com',
            'cpf' => '74693612006',
            'password' => '12345678'
        ]);
    }
}
