<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeDoctorTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeDoctorTableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(HomeDoctorTable::class)
            ->assertStatus(200);
    }
}
