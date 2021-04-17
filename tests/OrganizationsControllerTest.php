<?php

use Laravel\Lumen\Testing\DatabaseMigrations;


/**
 * Class DonatorsControllerTest
 * @covers \App\Http\Controllers\OrganizationsController
 */
class OrganizationsControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @covers \App\Http\Controllers\OrganizationsController::create
     */
    public function should_create()
    {
        $response = $this->post('/v1/organizations', [
            'name' => 'Organization name',
            'cnpj' => '11879562000173',
            'email' => 'contact@organization.org',
            'website' => 'https://www.organization.org',
            'statement' => 'I solemnly swear that I am up to only good',
            'phone_number' => '11997003220'
        ]);

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_CREATED);

        $this->seeInDatabase('organizations', ['name' => 'Organization name', 'cnpj' => '11879562000173', 'email' => 'contact@organization.org', 'website' => 'https://www.organization.org', 'statement' => 'I solemnly swear that I am up to only good', 'active' => 0]);

        ### ONLY REQUIRED FIELDS
        $response = $this->post('/v1/organizations', [
            'name' => 'Organization name 2',
            'cnpj' => '57310726000148',
            'email' => 'contact2@organization.org',
            'statement' => 'I solemnly swear that I am up to only good',
        ]);
        $this->dump();

        $response->assertResponseStatus(\Illuminate\Http\Response::HTTP_CREATED);
        $this->seeInDatabase('organizations', ['name' => 'Organization name 2', 'cnpj' => '57310726000148', 'email' => 'contact2@organization.org', 'active' => 0]);
    }
}
