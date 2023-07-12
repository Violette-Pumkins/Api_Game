<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Response;

class VerifyToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        try {
            JWT::decode($token, 'jQYW9nx6bTvjF81EAPWuQx4irlLtjsKu1AX3tZRQPWEq4qLfjaJJ7hjojU1PGUzS', ['HS256']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
