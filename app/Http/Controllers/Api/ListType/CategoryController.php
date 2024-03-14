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
        try {
            $data = $this->model->where('list_id', '1')->get();

            foreach ($data as $cate) {
                $cate->icon_or_image = url('/') . '/' . $cate->icon_or_image;
            }

            return Response([
                'status'  => '200',
                'message' => 'Data retrieved successfully',
                'data'    => $data
            ]);
        } catch (\Exception $e) {
            return Response([
                'status'  => '400',
                'message' => $e->getMessage()
            ]);
        }
    }
}
