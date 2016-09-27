<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        if ( ! auth()->guard('student')->check() ) {

            if ($request->ajax() || $request->wantsJson())
             {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }
}
