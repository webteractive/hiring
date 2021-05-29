<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hiring
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
        if (! config('app.hiring') && ! $request->is('/not-hiring-yet')) {
            // dd($request->route());
            return redirect()->route('not.hiring');
        }

        return $next($request);
    }
}
