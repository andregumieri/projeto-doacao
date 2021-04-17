<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function should_create_user()
    {
        $response = $this->post('/v1/users', [
            'email' => 'teste@email.com',
            'name' => 'Fulano Teste',
            'password' => '1234',
            'password_confirmation' => '1234'
        ]);

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_OK);

        $this->seeInDatabase('users', ['email' => 'teste@email.com', 'name' => 'Fulano Teste']);
    }

    /** @test */
    public function should_public_view()
    {
        $user = \App\Models\User::factory()->create();
        $this->get('/v1/users/' . $user->id)->seeJson([
            'name' => $user->name
        ]);
    }
}
