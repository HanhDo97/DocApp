<?php

namespace App\Http\Resources;

use App\Services\CategoryService;
use App\Services\DoctorService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $doctorService = new DoctorService(new CategoryService);

        return [
            'id'             => $this->id,
            'doctorName'     => $this->name,
            'doctorImage'    => url($this->user->image),
            'doctorAbout'    => $this->about,
            'doctorCateCode' => $this->cate_code,
            'doctorCateName' => $doctorService->getCategoryName($this->cate_code),
            'user'           => $this->user,
        ];
    }
}
