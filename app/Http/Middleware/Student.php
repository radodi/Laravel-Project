<?php

namespace App\Http\Middleware;

use Closure;

class Student
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
        if (($request->user()->role !='student')&&($request->user()->role !='admin')){
        return redirect ('/')->with('message','Нямате достъп до тази страница!!');
       }
        return $next($request);
    }
}
