<?php

namespace Tests\Feature\Models\LoginHistories;

use Tests\TestCase;
use App\Models\LoginHistory;

class LoginSuccessfullyTest extends TestCase
{
    /** @test */
    public function create_new_history_successfully()
    {
        // Create a new LoginHistory instance and save it
        $history = LoginHistory::create([
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        // Assert that the creation was successful
        $this->assertNotNull($history);

        // Delete the created history record
        $history->delete();

        // Assert that the record has been deleted
        $this->assertDatabaseMissing('login_histories', ['id' => $history->id]);
    }
}
