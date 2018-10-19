<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 26.08.18
 * Time: 14:36
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ParentRequest
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('role') != 'parent') {

            return redirect('NoPermission');

        }

        return $next($request);
    }
}