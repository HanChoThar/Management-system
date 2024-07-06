<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Attempt to parse the token from the request
            $token = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            // Token expired
            return response()->json(['error' => 'Token expired'], Response::HTTP_UNAUTHORIZED);
        } catch (TokenInvalidException $e) {
            // Token invalid
            return response()->json(['error' => 'Token invalid'], Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            // Token absent or other JWT exception
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        logger('pass');
        // Token is valid, proceed with the request
        return $next($request);
    }
}
