<?php

namespace App\Http\Resources;

use App\Services\CategoryService;
use App\Services\DoctorService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $doctorService = new DoctorService(new CategoryService);
        $timeMeet      = Carbon::createFromFormat('H:i:s.0000000', $this->time_meet);


        return [
            'doctorName'     => $this->doctor->name,
            'doctorImage'    => url($this->doctor->user->image),
            'doctorCateName' => $doctorService->getCategoryName($this->doctor->cate_code),
            'dateMeet'       => $this->date_meet,
            'timeMeet'       => $timeMeet->format('h:i A'),
        ];
    }
}
