<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Staff;
use App\Traits\PermissionTrait;

class UserService
{
    use PermissionTrait;

    public function me()
    {
        $authUser = auth()->user();
        return new UserResource($authUser);
    }

    public function getStaffInfo($user, $limit, $page)
    {
        $roles = $user->roles->pluck('name')->toArray();
        $employeeIds = $this->getEmployeeIds($roles, $user);

        $staffData = User::with(['roles', 'roles.permissions', 'staff.department'])
            ->whereIn('userId', $employeeIds)
            ->paginate($limit, ['*'], 'page', $page);

        return UserResource::collection($staffData);
    }
}
