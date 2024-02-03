<?php

namespace App\Livewire\Home;

use Livewire\Component;

class HomeCategoryTable extends Component
{
    public $cateName = '';
    public $cateCode = '';

    public function save(){
        $this->validate();

        dd($this->cateName);
    }

    public function rules()
    {
        return [
            'cateName' => 'required',
            'cateCode' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.home.home-category-table');
    }
}
