<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'depId' => $this->depId,
            'name' => $this->name,
            'label' => $this->label,
            'flag' => $this->flag,
        ];
    }
}
