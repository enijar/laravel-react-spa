<?php

namespace App\Http\Middleware;

use App\DeBeers\Http\JsonResponse;
use Closure;
use Exception;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTVerify extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $exception) {
            Log::error($exception);
            return JsonResponse::errors(['Unauthorized'], 401);
        }

        return $next($request);
    }
}
