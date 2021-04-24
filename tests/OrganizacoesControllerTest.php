<?php

use Laravel\Lumen\Testing\DatabaseMigrations;


/**
 * Class DonatorsControllerTest
 * @covers \App\Http\Controllers\OrganizacoesController
 */
class OrganizacoesControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @covers \App\Http\Controllers\OrganizacoesController::criar
     */
    public function deve_criar_desativado()
    {
        $response = $this->post('/v1/organizacoes', [
            'nome' => 'Nome',
            'cnpj' => '11879562000173',
            'email' => 'contact@organization.org',
            'site' => 'https://www.organization.org',
            'descricao' => 'Juro fazer só coisa boa',
            'telefone' => '11997003220'
        ]);

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_CREATED);
        $this->seeInDatabase('organizacoes', ['nome' => 'Nome', 'cnpj' => '11879562000173', 'email' => 'contact@organization.org', 'site' => 'https://www.organization.org', 'descricao' => 'Juro fazer só coisa boa', 'ativo' => 0]);


        ### ONLY REQUIRED FIELDS
        $response = $this->post('/v1/organizacoes', [
            'nome' => 'Nome 2',
            'cnpj' => '57310726000148',
            'email' => 'contact2@organization.org',
            'descricao' => 'Juro fazer só coisa boa',
        ]);

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_CREATED);
        $this->seeInDatabase('organizacoes', ['nome' => 'Nome 2', 'cnpj' => '57310726000148', 'email' => 'contact2@organization.org', 'ativo' => 0]);
    }
}
