<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeUserTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

    
}
