<?php


namespace Models;


use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Testing\DatabaseMigrations;

/**
 * Class UserTest
 * @package Models
 * @covers \App\Models\Usuario
 */
class UsuarioTest extends \TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @covers \App\Models\Usuario::creating
     */
    public function deve_criar_codigo_de_doador()
    {
        $user = new Usuario();
        $user->nome = 'Fulano de Tal';
        $user->senha = '1234';
        $user->email = 'teste@email.com';
        $user->cpf = '08941926041';
        $user->save();

        $user2 = new Usuario();
        $user2->nome = 'Fulano de Tal';
        $user2->senha = '1234';
        $user2->email = 'teste2@email.com';
        $user2->cpf = '74693612006';
        $user2->save();

        $this->assertNotNull($user->codigo_doador);
        $this->assertNotEmpty($user->codigo_doador);
        $this->assertNotEquals($user->codigo_doador, $user2->codigo_doador);
    }

    /** @test */
    public function deve_fazer_hash_da_senha()
    {
        $user = new Usuario();
        $user->nome = 'Fulano de Tal';
        $user->senha = '1234';
        $user->email = 'teste@email.com';
        $user->cpf = '74693612006';
        $user->save();

        $this->assertNotNull($user->senha);
        $this->assertNotEmpty($user->senha);
        $this->assertNotEquals('1234', $user->senha);
        $this->assertTrue(Hash::check(1234, $user->senha));
    }
}
