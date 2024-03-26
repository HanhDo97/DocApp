<?php

namespace App\Livewire\Home;

use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class HomePage extends Component
{
    public $type = 'users';

    public function changeTab($type)
    {
        return $this->redirect(route('home', ['type' => $type]), true);
    }
    public function render()
    {
        return view('livewire.home.home-page');
    }
}
