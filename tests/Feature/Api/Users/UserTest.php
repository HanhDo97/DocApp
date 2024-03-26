<?php

namespace Tests\Feature\Api\Users;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $userToken;
    protected $rootToken;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userToken = $this->getUserToken();
        $this->rootToken = $this->getRootToken();
    }

    /** @test */
    public function get_user_data_successfully()
    {
        $response = $this->getJson('/api/user/me', [
            'Authorization' => 'Bearer ' . $this->userToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'message', 'data'])
            ->assertJson([
                'status'  => '200',
                'message' => 'User data retrieved successfully'
            ]);

        $response = $this->getJson('/api/user/me', [
            'Authorization' => 'Bearer ' . $this->rootToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'message', 'data'])
            ->assertJson([
                'status'  => '200',
                'message' => 'User data retrieved successfully'
            ]);
    }

    /** @test */
    public function get_all_user_data_successfully()
    {
        $response = $this->getJson('/api/user/all', [
            'Authorization' => 'Bearer ' . $this->rootToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'message', 'data'])
            ->assertJson([
                'status'  => '200',
                'message' => 'Get List User successfully'
            ]);
    }

    /** @test */
    public function get_all_user_data_unsuccessfully()
    {
        $response = $this->getJson('/api/user/all', [
            'Authorization' => 'Bearer ' . $this->userToken
        ]);

        $response->assertStatus(401)
            ->assertJsonStructure(['error'])
            ->assertJson([
                'error' => 'User doesn\'t have sufficient authorization'
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

    public function getRootToken()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'root@app',
            'password' => 'password'
        ]);

        return $response->json()['token'];
    }
}
