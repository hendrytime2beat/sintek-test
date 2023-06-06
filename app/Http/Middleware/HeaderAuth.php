<?php

namespace App\Http\Middleware;

use Closure;

class HeaderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->header('X-Api-Key'))) {
            return response()->json([
                'code' => 500,
                'message' => 'X-Api-Key is empty'
            ]);
        }
        if ($request->header('X-Api-Key') != 'h0%3#2l&m2!k3#8@40#29%0924&38*423d!as#oi$83%42') {
            return response()->json([
                'code' => 500,
                'message' => 'X-Api-Key is not valid'
            ]);
        }
        return $next($request);
    }
}
