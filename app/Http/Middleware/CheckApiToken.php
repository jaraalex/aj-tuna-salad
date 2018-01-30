<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use App\ApiToken;

class CheckApiToken extends Middleware
{
    public function handle($request, Closure $next, $guard = null)
    {

        $attempt_header = $request->header('(X-API-KEY');

        $token = ApiToken::where('token', $attempt_header)->first();

        if ($token) {
            return $next($request);
        } else {
            return response()->json([
                'message' => "invalid token",
            ], 401);
        }
    }
}
