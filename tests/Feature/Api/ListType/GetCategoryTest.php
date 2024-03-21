<?php

namespace Tests\Feature\Api\ListType;

use Tests\TestCase;

class GetCategoryTest extends TestCase
{
    protected $userToken;
    protected $rootToken;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userToken = $this->getUserToken();
    }

    /** @test */
    public function get_category_successfully(){
        $response = $this->getJson('/api/list_type/categories', [
            'Authorization' => 'Bearer ' . $this->userToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'message', 'data'])
            ->assertJson([
                'status'  => '200',
                'message' => 'Data retrieved successfully'
            ]);
    }

    public function getUserToken()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'users@app',
            'password' => 'password'
        ]);

        return $response->json()['token'];
    }
}