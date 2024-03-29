<?php

namespace App\Livewire\Home;

use App\Models\Doctors;
use App\Models\User;
use Livewire\Attributes\On;
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

        $this->reset();
    }


    public function openEditDoctorModal($doctorId)
    {
        $this->dispatch('editDoctor', $doctorId);
    }

    public function rules()
    {
        return  [
            'userName'   => 'required|exists:users,name',
            'doctorName' => 'required',
            'about'      => 'required'
        ];
    }

    #[On('doctorUpdated')]
    public function render()
    {
        $this->doctors = Doctors::select('*')->orderBy('created_at', 'desc')->get();

        return view('livewire.home.home-doctor-table');
    }
}
