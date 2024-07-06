<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'roleId' => $this->roleId,
            'name' => $this->name,
            'label' => $this->label,
            'flag' => $this->flag,
            'permissions' => PermissionResource::collection($this->permissions)
        ];
    }
}
