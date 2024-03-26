<?php

namespace App\Livewire\Edit;

use App\Models\Doctors;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\On;

class DoctorEdit extends Component
{
    public $class;
    public $style;
    public $editName;
    public $categories;
    public $userEmail;
    public $doctorName;
    public $doctorAbout;
    public $doctorCate;
    public $doctorId;

    #[On('editDoctor')]
    public function editDoctor($id)
    {
        $this->class = 'show';
        $this->style = 'display: block;';

        $doctor = Doctors::select('name', 'user_id', 'cate_code', 'about')->find($id);

        $this->doctorName  = $doctor->name;
        $this->userEmail   = $doctor->user->email;
        $this->doctorCate  = $doctor->cate_code;
        $this->doctorAbout = $doctor->about;
        $this->doctorId    = $id;
    }

    public function saveChange()
    {
        $this->validate();

        // Find the doctor by id
        $doctor = Doctors::findOrFail($this->doctorId);

        // Find the doctor by id and update the fields
        $doctor->update([
            'name'      => $this->doctorName,
            'cate_code' => $this->doctorCate,
            'about'     => $this->doctorAbout
        ]);

        // Update the user email
        $doctor->user->update([
            'email' => $this->userEmail
        ]);

        // Delete cache of top doctors
        Cache::delete('topDoctors');

        $this->dispatch('doctorUpdated');

        // Reset the form fields after saving changes
        $this->reset(['doctorName', 'doctorCate', 'doctorAbout', 'userEmail']);
    }

    public function toggleEditMode($mode)
    {
        $this->validateOnly($this->getInputModel($mode));
        $this->$mode = !$this->$mode;
    }

    public function getInputModel($mode)
    {
        switch ($mode) {
            case "editName":
                return "doctorName";
            default:
                return "";
        }
    }

    public function rules()
    {
        return  [
            'userEmail'  => 'required',
            'doctorName' => 'required',
        ];
    }

    public function mount(CategoryService $categoryService,)
    {
        $this->categories = $categoryService->getListCategory();
        $this->editName   = false;
    }

    public function render()
    {
        return view('livewire.edit.doctor-edit');
    }
}
