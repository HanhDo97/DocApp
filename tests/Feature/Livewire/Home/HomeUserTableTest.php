<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeUserTable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class HomeUserTableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(HomeUserTable::class)
            ->assertStatus(200);
    }

    /** @test */
    public function create_user_successfully()
    {
        $user = User::create([
            'name'     => 'SomeName',
            'email'    => 'SomeEmail',
            'password' => Hash::make('SomePassword')
        ]);

        $user = $user->delete();

        $this->assertNotNull($user);
    }

    /** @test */
    public function upload_file_successfully()
    {
        $file = UploadedFile::fake()->image('avatar.png');
        $imagePath = $file->store('user/images');

        Storage::disk('public')->assertExists($imagePath);
    }
}
