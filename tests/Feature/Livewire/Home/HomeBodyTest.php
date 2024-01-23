<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeBody;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
}
