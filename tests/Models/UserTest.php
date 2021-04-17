<?php


namespace Models;


use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;

/**
 * Class UserTest
 * @package Models
 * @covers \App\Models\User
 */
class UserTest extends \TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @covers \App\Models\User::creating
     */
    public function should_create_donator_code()
    {
        $user = new User();
        $user->name = 'Fulano de Tal';
        $user->password = '1234';
        $user->email = 'teste@email.com';
        $user->cpf = '08941926041';
        $user->save();

        $user2 = new User();
        $user2->name = 'Fulano de Tal';
        $user2->password = '1234';
        $user2->email = 'teste2@email.com';
        $user2->cpf = '74693612006';
        $user2->save();

        $this->assertNotNull($user->donator_code);
        $this->assertNotEmpty($user->donator_code);
        $this->assertNotEquals($user->donator_code, $user2->donator_code);
    }

    /** @test */
    public function should_encrypt_password()
    {
        $user = new User();
        $user->name = 'Fulano de Tal';
        $user->password = '1234';
        $user->email = 'teste@email.com';
        $user->save();

        $this->assertNotNull($user->password);
        $this->assertNotEmpty($user->password);
        $this->assertNotEquals('1234', $user->password);
    }
}
