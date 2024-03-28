<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Resources\DoctorResource;
use App\Models\Doctors;
use App\Models\ListChild;
use App\Services\DoctorService;
use Illuminate\Support\Facades\Cache;

class DoctorController
{
    private $model;
    private $service;
    private $listChild;

    public function __construct(Doctors $model, ListChild $listChild, DoctorService $service)
    {
        $this->model     = $model;
        $this->listChild = $listChild;
        $this->service   = $service;
    }

    public function getDoctorRanked()
    {
        try {
            $topDoctors = Cache::get('topDoctors');
            if (!$topDoctors) {
                $topDoctors =
                    $this->model->select('id', 'name', 'cate_code', 'user_id', 'about')
                    ->with(['user' => function ($query) {
                        $query->select('id', 'image');
                    }])
                    ->whereNotNull('rank')->take(5)->get();
                Cache::set('topDoctors', $topDoctors);
            }

            foreach ($topDoctors as $doctor) {
                $doctor->image = url($doctor->user->image);
                $doctor->cate_name = $this->service->getCategoryName($doctor->cate_code);
            }
            return Response([
                'status'  => '200',
                'message' => 'Data retrieved successfully',
                'data'    => DoctorResource::collection($topDoctors),
            ]);
        } catch (\Exception $e) {
            return Response([
                'status'  => '400',
                'message' => $e->getMessage(),
                'data'    => []
            ]);
        }
    }
}
