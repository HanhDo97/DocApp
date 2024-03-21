<?php

namespace App\Livewire\Home;

use App\Models\Doctors;
use App\Models\User;
use Livewire\Component;

class HomeDoctorTable extends Component
{
    public $doctors;
    public $userName;
    public $doctorName;
    public $about;
    public $editDoctorId;

    public function save()
    {
        $this->validate();

        // Find the user by user name
        $user = User::where('name', $this->userName)->first();

        Doctors::create([
            'user_id' => $user->id,
            'name'    => $this->doctorName,
            'about'   => $this->about
        ]);
    }

    public function rules()
    {
        return  [
            'userName'   => 'required|exists:users,name',
            'doctorName' => 'required',
            'about'      => 'required'
        ];
    }

    public function editDoctor($id)
    {
        $doctor = Doctors::find($id);
        $this->dispatch('editDoctor', $doctor);
    }

    public function render()
    {
        $this->doctors = Doctors::select('*')->orderBy('created_at', 'desc')->get();

        return view('livewire.home.home-doctor-table');
    }
}
