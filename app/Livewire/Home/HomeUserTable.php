<?php

namespace App\Livewire\Home;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeUserTable extends Component
{
    use WithFileUploads;

    public $username;
    public $password;
    public $users = [];
    public $userImage;


    public function save()
    {
        $this->validate();
        $imagePath = $this->userImage->store('user/images');

        User::create([
            'name'     => $this->username,
            'email'    => $this->username . '@app',
            'password' => Hash::make($this->password),
            'image'    => 'storage/' . $imagePath
        ]);

        // reset input
        $this->reset();
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function messages()
    {
        return [
            'username.required' => 'UserName need to be filled'
        ];
    }

    public function rules()
    {
        return  [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function render()
    {
        $this->users = User::select('*')->orderBy('created_at', 'desc')->get();

        return view('livewire.home.home-user-table');
    }
}
