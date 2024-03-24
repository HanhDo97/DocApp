<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class Nav extends Component
{
    public function logout(){
        auth()->logout();

        redirect('login');
    }

    public function render()
    {
        return view('livewire.layouts.nav');
    }
}
