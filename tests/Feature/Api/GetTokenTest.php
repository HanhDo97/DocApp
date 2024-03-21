<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class GetTokenTest extends TestCase
{
    /** @test */
    public function get_token_successfully()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'root@app',
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status','message','token']);
    }

    /** @test */
    public function get_token_with_wrong_credentials()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'root@app',
            'password' => 'wrong_password'
        ]);

        $response->assertStatus(422)
            ->assertExactJson(['message' => 'The provided credentials are incorrect.', 'errors' => ['email' => ['The provided credentials are incorrect.']]]);
    }
}
