<?php

namespace App\Livewire\Home;

use App\Models\ListType;
use App\Services\ListTypeService;
use Livewire\Component;

class HomeListTypeTable extends Component
{
    public $name = '';
    public $code = '';
    public $types = [];

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
        $this->types = ListType::all();

        return view('livewire.home.home-list-type-table');
    }
}
