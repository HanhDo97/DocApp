<?php

namespace Tests\Feature\Api\Doctors;

use Tests\TestCase;


class AppointmentTest extends TestCase
{

    protected $userToken;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userToken = $this->getUserToken();
    }

    public function getUserToken()
    {
        $response = $this->postJson('/api/get_token', [
            'email'    => 'users@app',
            'password' => 'password'
        ]);

        return $response->json()['token'];
    }

    /** @test */
    public function get_today_user_appointments_successfully(){
        $response = $this->getJson('/api/appointments/user', [
            'Authorization' => 'Bearer ' . $this->userToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'message', 'data'])
            ->assertJson([
                'status'  => '200',
                'message' => 'Data retrieved successfully'
            ]);
    }
}
