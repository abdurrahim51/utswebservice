<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use app\Helpers\ApiFormatter;

class SetDefaultHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasHeader('Authorization')) {
            return ApiFormatter::createJson(400, 'Unauthorized');
        }
        if (!$request->hasHeader('Accept')) {
            return ApiFormatter::createJson(401, 'Bad Reques');
        }
        return $next($request);
    }
}