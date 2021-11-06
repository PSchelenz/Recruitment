<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBlocked
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
        if(!auth()->guest() and auth()->user()->is_blocked) {
            return redirect('blocked');
        }
        return $next($request);
    }
}
