<?php

namespace App\Http\Middleware;

use Closure;

class PlatnosciIpAllowed
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
        if (!in_array($request->ip(), ["91.216.191.181", "91.216.191.182","91.216.191.183","91.216.191.184", "91.216.191.185", "5.252.202.255"]))
        {
            abort( response('not allowed', 403) );
        }

        return $next($request);
    }
}
