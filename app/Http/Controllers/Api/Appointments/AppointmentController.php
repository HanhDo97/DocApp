<?php

namespace App\Http\Controllers\Api\Appointments;

use App\Http\Resources\AppointmentRecource;
use Illuminate\Http\Request;

class AppointmentController
{
    public function __construct()
    {
    }

    public function getTodayMeetting(Request $request)
    {
        try {
            $user           = $request->user();
            $appointments   = $user->appointments;
            $todayMeetings = $appointments->where('date_meet', date('Y-m-d'));
            
            return Response([
                'status'  => '200',
                'message' => 'Data retrieved successfully',
                'data'    => AppointmentRecource::collection($todayMeetings),
            ]);
        } catch (\Exception $e) {
            dd($e);
            return Response([
                'status'  => '500',
                'message' => 'Something wrong',
            ]);
        }
    }
}
