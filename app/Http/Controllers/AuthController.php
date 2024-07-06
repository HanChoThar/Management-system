<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $credentials = $validator->validated();
        $token = $this->authService->login($credentials['email'], $credentials['password']);

        if ($token) {
            return response()->json(['token' => $token], JsonResponse::HTTP_OK);
        }
        return response()->json(['error' => 'Unauthorized'], JsonResponse::HTTP_UNAUTHORIZED);
    }
}
