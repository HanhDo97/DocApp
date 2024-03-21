<?php

namespace App\Livewire\Edit;

use App\Models\Doctors;
use Livewire\Component;

class DoctorEdit extends Component
{
    public String $name;
    public String $about;
    protected $listeners = ['editDoctor'];

    public function editDoctor($doctor){
        $this->name = $doctor['name'];
        $this->about = $doctor['about'];
    }

    public function render()
    {
        return view('livewire.edit.doctor-edit');
    }
}
