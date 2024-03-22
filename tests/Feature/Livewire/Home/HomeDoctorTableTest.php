<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\HomeDoctorTable;
use App\Models\Doctors;
use App\Models\User;
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

    /** @test */
    public function can_create_doctor()
    {
        $user = User::select('id')->where('name', 'users')->first();

        Livewire::test(HomeDoctorTable::class)
            ->set('userName', 'users')
            ->set('doctorName', 'doctor name test')
            ->set('about', 'about test')
            ->call('save');

        $this->assertTrue(Doctors::whereUserId($user->id)->exists());
    }

    /** @test */
    public function can_delete_doctor()
    {
        $user = User::select('id')->where('name', 'users')->first();

        $value = Doctors::where('user_id', $user->id)->delete();

        $this->assertIsInt($value);
    }

    /** @test */
    public function validate_value_errors()
    {
        Livewire::test(HomeDoctorTable::class)
            ->set('userName', '')
            ->call('save')
            ->assertHasErrors();

        Livewire::test(HomeDoctorTable::class)
            ->set('doctorName', '')
            ->call('save')
            ->assertHasErrors();

        Livewire::test(HomeDoctorTable::class)
            ->set('about', '')
            ->call('save')
            ->assertHasErrors();
    }
}
