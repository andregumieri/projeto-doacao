<?php

namespace Database\Seeders;

use App\Models\Organizacao;
use Illuminate\Database\Seeder;

class OrganizacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizacao::create([
             'nome' => 'ONG',
             'email' => 'ong@email.com',
             'cnpj' => '11879562000173',
             'site' => 'https://ong.org',
             'telefone' => '0800 123 1234',
             'ativo' => 1,
         ]);
    }
}
