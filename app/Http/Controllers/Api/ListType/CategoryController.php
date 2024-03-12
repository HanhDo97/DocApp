<?php

namespace App\Http\Controllers\Api\ListType;

use Illuminate\Support\Facades\DB;

class CategoryController
{
    protected $model;

    public function __construct()
    {
        $this->model = DB::table('list_children');
    }

    public function getList()
    {
        $data = $this->model->where('list_id', '1')->get();

        return Response([
            'status'  => 200,
            'message' => 'Data retrieved successfully',
            'data'    => $data
        ]);
    }
}
