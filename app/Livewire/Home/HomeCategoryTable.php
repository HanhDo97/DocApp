<?php

namespace App\Livewire\Home;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeCategoryTable extends Component
{
    public $cateName = '';
    public $cateCode = '';
    public $children = [];

    public function save()
    {
        $this->validate();

        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => $this->cateCode,
            'name'    => $this->cateName,
        ]);

        $this->reset();
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
        $this->children = DB::table('list_children')->where('list_id', '1')->get();

        return view('livewire.home.home-category-table');
    }
}
