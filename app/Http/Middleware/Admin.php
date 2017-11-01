<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
<<<<<<< HEAD
        if ($request->user()->role !='admin') {
            return redirect('/')->withMessage('What are you trying to do?');
        }
        return $next($request);
=======
       if ($request->user()->role !='admin'){
        return redirect ('/')->with('message','Forbidden');
       }
       return $next($request);
>>>>>>> origin/master
    }
}
