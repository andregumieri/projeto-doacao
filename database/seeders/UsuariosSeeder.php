<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nome' => 'Doador da Silva',
            'email' => 'user@email.com',
            'cpf' => '74693612006',
            'senha' => '12345678'
        ]);
    }
}
