<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Models\Doctors;

class DoctorController
{
    private $model;

    public function __construct(Doctors $model)
    {
        $this->model = $model;
    }

    public function getDoctorRanked()
    {
        try {
            $data = $this->model->whereNotNull('rank')->get();

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
