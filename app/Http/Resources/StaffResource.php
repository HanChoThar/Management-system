<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'staffId' => $this->staffId,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'joinedDate' => $this->joinedDate,
            'position' => $this->position,
            'age' => $this->age,
            'gender' => $this->gender,
            'status' => $this->status,
            'department' => new DepartmentResource($this->department),
        ];
    }
}
