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
    public $speciality;

    public function save()
    {
        $this->validate();

        // Find the user by user name
        $user = User::where('name', $this->userName)->first();

        Doctors::create([
            'user_id'    => $user->id,
            'name'       => $this->doctorName,
            'speciality' => $this->speciality
        ]);
    }

    public function rules()
    {
        return  [
            'userName'   => 'required|exists:users,name',
            'doctorName' => 'required',
            'speciality' => 'required'
        ];
    }

    public function render()
    {
        $this->doctors = Doctors::select('*')->orderBy('created_at', 'desc')->get();

        return view('livewire.home.home-doctor-table');
    }
}
