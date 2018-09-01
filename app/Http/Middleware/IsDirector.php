<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 30.08.18
 * Time: 14:28
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsDirector
{
    public function handle(Request $request, Closure $next)
    {
        if(session('role') != 'director') {

            return redirect('NoPermission');

        }

        return $next($request);
    }
}