<?php

namespace App\Http\Middleware;

use Closure;

class Clerk
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

        if ( Auth::check() && Auth::user()->isClerk() )
        {
            return $next($request);
        }
        return $next($request);
    }
}
