<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class forMember
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
        if (Auth::user()->role == 'member') {
            return $next($request);
        }
           
        return redirect()->route('home_pizza', 'all');
    }
}
