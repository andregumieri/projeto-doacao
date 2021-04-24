<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function deve_criar()
    {
        $response = $this->post('/v1/usuarios', [
            'email' => 'teste@email.com',
            'nome' => 'Fulano Teste',
            'senha' => '1234',
            'senha_confirmation' => '1234',
            'cpf' => '74693612006'
        ]);

        $this->dump();

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_OK);

        $this->seeInDatabase('usuarios', ['email' => 'teste@email.com', 'nome' => 'Fulano Teste']);
    }

    /** @test */
    public function deve_mostrar_dados_publicos()
    {
        $user = \App\Models\Usuario::factory()->create();
        $this->get('/v1/usuarios/' . $user->id)->seeJson([
            'nome' => $user->nome
        ]);
    }
}
