<?php

namespace App\Livewire\Login;

use App\Events\LoginEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class LoginPage extends Component
{
    public $email;
    public $password;
    public bool $rememberMe = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function checkLogin(Request $request)
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->rememberMe)) {
            LoginEvent::dispatch(auth()->user());
            
            return redirect(route('home'));
        }

        return $this->addError('password', 'Password is incorrected');
    }

    public function render()
    {
        return view('livewire.login.login-page');
    }
}
