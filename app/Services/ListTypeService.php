<?php

namespace App\Services;

use App\Models\ListType;

class ListTypeService{
    public static function create($data){
        ListType::create($data);
    }
}