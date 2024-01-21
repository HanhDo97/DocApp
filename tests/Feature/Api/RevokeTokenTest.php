<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class RevokeTokenTest extends TestCase
{
    /** @test */
    public function revoke_token_successfully()
    {
        $response = $this->postJson('/api/revoke_token', [
            'email'    => 'root@app',
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertExactJson(['status' => '200', 'message' => 'Tokens revoked successfully']);
    }

    /** @test */
    public function revoke_token_with_wrong_credentials()
    {
        $response = $this->postJson('/api/revoke_token', [
            'email'    => 'root@app',
            'password' => 'wrong_password'
        ]);

        $response->assertStatus(422)
            ->assertExactJson(['message' => 'The provided credentials are incorrect.', 'errors' => ['email' => ['The provided credentials are incorrect.']]]);
    }
}
