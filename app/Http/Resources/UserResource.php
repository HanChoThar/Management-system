<?php

namespace App\Http\Resources;

use App\Models\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'userId' => $this->userId,
            'name' => $this->name,
            'email' => $this->email,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'flag' => $this->flag,
            'roles' => RoleResource::collection($this->roles),
            'staff' => new StaffResource($this->staff),

        ];
    }
}
