<?php

namespace App\Http\Middleware;

use Closure;

class Arbiter
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
        if ($request->user()->role !='arbiter') {
            return redirect('/home')->withMessage('What are you trying to do?');
        }
        return $next($request);
    }
}
