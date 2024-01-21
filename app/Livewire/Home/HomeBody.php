<?php

namespace App\Livewire\Home;

use Livewire\Component;

class HomeBody extends Component
{
    public $type;

    public function mount()
    {
        $this->type = request()->query('type', 'users');
    }

    public function render()
    {
        return view('livewire.home.home-body');
    }
}
