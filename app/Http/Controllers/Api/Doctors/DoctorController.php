<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Models\Doctors;
use App\Models\ListChild;
use Illuminate\Support\Facades\Cache;

class DoctorController
{
    private $model;
    private $listChild;

    public function __construct(Doctors $model, ListChild $listChild)
    {
        $this->model     = $model;
        $this->listChild = $listChild;
    }

    public function getDoctorRanked()
    {
        try {
            $data = $this->model->whereNotNull('rank')->get();

            // Get List Category
            $categories = Cache::get('categories');
            if (empty($categories)) {
                $categories = $this->listChild->select('code','name')->where('list_id', '1')->get()->toArray();
                Cache::set('categories', $categories);
            }

            foreach ($data as $doctor) {
                $doctor->image = url($doctor->user->image);
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
