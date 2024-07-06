<?php

namespace App\Traits;

use App\Models\User;

trait PermissionTrait
{
    public function getEmployeeIds($roles, $user)
    {
        $query = User::query()->where('userId', '<>', $user->userId);

        if (in_array('Manager', $roles)) {
            $query->whereHas('staff', function ($q) use ($user) {
                $q->where('depId', $user->staff->depId);
            });
        } elseif (in_array('Super Admin', $roles)) {
            $query = $query;
        } else { // for StandardUser
            return [];
        }

        return $query->orderBy('name')->pluck('userId')->toArray();
    }
}
