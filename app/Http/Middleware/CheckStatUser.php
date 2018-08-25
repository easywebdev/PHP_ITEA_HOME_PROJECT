<?php

namespace App\Http\Middleware;

use Closure;

class CheckStatUser
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
        if(session('childID')) {

            if(session('childID') != $request->route()->parameter('id')) {

                return redirect('NoPermission');

            }

        } else {

            if(session('userID') != $request->route()->parameter('id')) {

                return redirect('NoPermission');
            }

        }

        return $next($request);
    }
}
