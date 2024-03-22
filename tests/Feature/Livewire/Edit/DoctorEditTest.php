<?php

namespace Tests\Feature\Livewire\Edit;

use App\Livewire\Edit\DoctorEdit;
use App\Models\Doctors;
use Livewire\Livewire;
use Tests\TestCase;

class DoctorEditTest extends TestCase
{
    /** @test */
    public function load_data_edit_successfully()
    {
        Livewire::test(DoctorEdit::class)
            ->call('editDoctor', 1)
            ->assertSet('doctorName', function ($value) {
                return !empty($value);
            })->assertSet('userEmail', function ($value) {
                return !empty($value);
            })->assertSet('doctorCate', function ($value) {
                return !empty($value);
            });
    }

    /** @test */
    public function updated_doctor_successfully()
    {
        $doctor = Doctors::findOrFail(1);

        Livewire::test(DoctorEdit::class)
            ->set('doctorId', $doctor->id)
            ->set('doctorName', $doctor->name)
            ->set('doctorCate', $doctor->cate_code)
            ->set('doctorAbout', $doctor->about)
            ->set('userEmail', $doctor->user->email)
            ->call('saveChange')
            ->assertDispatched('doctorUpdated');
    }
}
