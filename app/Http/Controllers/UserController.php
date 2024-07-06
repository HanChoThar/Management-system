<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function fetchMe(Request $request)
    {
        $profileData = $this->userService->me();

        return $profileData;
    }

    public function fetchStaffsInfo(Request $request)
    {
        $limit = $request->query('limit', 10);
        $page = $request->query('page', 1); 
        $user = auth()->user();

        $data = $this->userService->getStaffInfo($user, $limit, $page);

        return $data;
    }
}
