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
            ->assertJsonStructure(['status', 'message', 'token']);
    }

    /** @test */
    public function get_token_with_wrong_credentials()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'root@app',
            'password' => 'wrong_password'
        ]);

        $response->assertStatus(200)
            ->assertExactJson([
                'status'  => 422,
                'message' => 'The provided credentials are incorrect.',
            ]);
    }
}
