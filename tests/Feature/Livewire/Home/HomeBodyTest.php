<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeBody;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class HomeBodyTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(HomeBody::class)
            ->assertStatus(200);
    }

    /** @test */
    public function create_user_successfully()
    {
        $user = User::create([
            'name' => 'SomeName',
            'email'=>'SomeEmail',
            'password' => Hash::make('SomePassword')
        ]);

        $user = $user->delete();
        
        $this->assertNotNull($user);

    }
}
