<?php

namespace App\Livewire\Home;

use App\Services\ListTypeService;
use Livewire\Component;

class HomeListTypeTable extends Component
{
    public $name = '';
    public $code = '';

    public function save()
    {
        $this->validate();

        ListTypeService::create([
            'name' => $this->name,
            'code' => $this->code
        ]);

        $this->reset();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.home.home-list-type-table');
    }
}
