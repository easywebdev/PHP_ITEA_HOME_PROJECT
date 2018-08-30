<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTeacher
{
    public function handle(Request $request, Closure $next)
    {
        if(session('role') != 'teacher') {

            return redirect('NoPermission');

        }

        return $next($request);
    }
}